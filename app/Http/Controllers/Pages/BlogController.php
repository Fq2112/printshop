<?php

namespace App\Http\Controllers\Pages;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function blog(Request $request)
    {
        $categories = BlogCategory::orderBy('name')->get();
        $keyword = $request->q;
        $category = $request->filter;

        \App\Models\Visitor::hit();
        return view('pages.blog.index', compact('categories', 'keyword', 'category'));
    }

    public function getDataBlog(Request $request)
    {
        if (is_null($request->filter)) {
            $blog = Blog::where('title', 'LIKE', '%' . $request->q . '%')->orderByDesc('id')->paginate(12);
        } else {
            $blog = Blog::where('title', 'LIKE', '%' . $request->q . '%')
                ->where('category_id', $request->filter)->orderByDesc('id')->paginate(12);
        }

        foreach ($blog as $index => $row) {
            $tgl = Carbon::parse($row->created_at);
            $blog[$index] = [
                'author' => $row->getAdmin->username,
                'category' => $row->getBlogCategory->name,
                'date' => Carbon::parse($row->created_at)->formatLocalized('%d %B %Y'),
                'title' => $row->title,
                'link' => route('detail.blog', ['author' => $row->getAdmin->username,
                    'y' => $tgl->format('Y'), 'm' => $tgl->format('m'), 'd' => $tgl->format('d'),
                    'title' => $row->permalink]),
                'thumbnail' => asset('storage/blog/thumbnail/' . $row->thumbnail),
                'content' => Str::words($row->content, 20, '...'),
            ];
        }

        return $blog;
    }

    public function cariJudulBlog(Request $request)
    {
        $blog = Blog::where('title', 'LIKE', '%' . $request->title . '%')->orderByDesc('id')->get();

        foreach ($blog as $index => $row) {
            $tgl = Carbon::parse($row->created_at);
            $blog[$index] = [
                'category_id' => $row->category_id,
                'title' => $row->title,
                'link' => route('detail.blog', ['author' => $row->getAdmin->username,
                    'y' => $tgl->format('Y'), 'm' => $tgl->format('m'), 'd' => $tgl->format('d'),
                    'title' => $row->permalink]),
                'thumbnail' => asset('storage/blog/thumbnail/' . $row->thumbnail),
            ];
        }

        return $blog;
    }

    public function detailBlog(Request $request)
    {
        $admin = Admin::where('username', $request->author)->firstOrFail();

        if (is_null($request->segment(5))) {
            $latest = Blog::where('admin_id', $admin->id)->orderByDesc('id')->take(5)->get();
            $archive = Blog::where('admin_id', $admin->id)->get()->groupBy(function ($q) {
                return Carbon::parse($q->created_at)->format('F Y');
            });

            \App\Models\Visitor::hit();
            return view('pages.blog.author', compact('admin', 'latest', 'archive'));

        } else {
            $blog = Blog::where('admin_id', $admin->id)->whereYear('created_at', $request->year)
                ->whereMonth('created_at', $request->month)->whereDay('created_at', $request->date)
                ->where('permalink', $request->title)->orwhere('permalink', $request->title)->firstOrFail();

            $prev = is_null($blog->prev()) ? null : $blog->prev();
            $next = is_null($blog->next()) ? null : $blog->next();

            $relates = Blog::where('category_id', $blog->category_id)->where('id', '!=', $blog->id)->orderByDesc('id')->get();

            $tgl = Carbon::parse($blog->created_at);
            $uri_blog = URL::current();
            $uri_author = route('detail.blog', ['author' => $admin->username]);

            \App\Models\Visitor::hit();
            return view('pages.blog.detail', compact('admin', 'blog', 'prev', 'next', 'relates',
                'tgl', 'uri_blog', 'uri_author'));
        }
    }
}
