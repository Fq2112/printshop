<?php

namespace App\Http\Controllers\Pages;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
            $blog = Blog::where('title', 'LIKE', '%' . $request->q . '%')
                ->orderByDesc('id')->paginate(12);
        } else {
            $blog = Blog::where('title', 'LIKE', '%' . $request->q . '%')
                ->where('category_id', $request->filter)->orderByDesc('id')->paginate(12);
        }

        foreach ($blog as $index => $row) {
            $tgl = Carbon::parse($row->created_at);
            $blog[$index] = [
                'author' => $row->getAdmin->username,
                'category' => $row->getBlogCategory->name,
                'date' => Carbon::parse($row->created_at)->formatLocalized('%d %b %Y'),
                'title' => $row->title,
                'link' => route('detail.blog', ['lang' => App::getLocale(), 'author' => $row->getAdmin->username,
                    'y' => $tgl->format('Y'), 'm' => $tgl->format('m'), 'd' => $tgl->format('d'),
                    'title' => $row->permalink]),
                'thumbnail' => asset('storage/blog/thumbnail/' . $row->thumbnail),
                'content' => Str::words($row->content, 20, '...') . '</p>',
            ];
        }

        return $blog;
    }

    public function cariJudulBlog(Request $request)
    {
        $blog = Blog::where('title->en', 'LIKE', '%' . $request->title . '%')->orwhere('title->id', 'LIKE', '%' . $request->title . '%')->get();

        foreach ($blog as $index => $row) {
            $tgl = Carbon::parse($row->created_at);
            $blog[$index] = [
                'category_id' => $row->category_id,
                'title' => $row->title,
                'link' => route('detail.blog', ['lang' => App::getLocale(), 'author' => $row->getAdmin->username,
                    'y' => $tgl->format('Y'), 'm' => $tgl->format('m'), 'd' => $tgl->format('d'),
                    'title' => $row->permalink]),
                'thumbnail' => asset('storage/blog/thumbnail/' . $row->thumbnail),
            ];
        }

        return $blog;
    }

    public function detailBlog($author, $year = null, $month = null, $date = null, $title = null)
    {
        $admin = Admin::where('username', $author)->firstOrFail();

        if (!$year && !$month && !$date && !$title) {
            $latest = Blog::where('admin_id', $admin->id)->orderByDesc('id')->take(5)->get();
            $archive = Blog::where('admin_id', $admin->id)->get()->groupBy(function ($q) {
                return Carbon::parse($q->created_at)->format('F Y');
            });

            \App\Models\Visitor::hit();
            return view('pages.blog.author', compact('user', 'latest', 'archive'));

        } else {
            $blog = Blog::where('admin_id', $admin->id)->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)->whereDay('created_at', $date)
                ->where('permalink', $title)->firstOrFail();
            $relates = Blog::where('category_id', $blog->category_id)->wherenotin('id', [$blog->id])->orderByDesc('id')->get();

            $tgl = Carbon::parse($blog->created_at);
            $uri = route('detail.blog', ['author' => $admin->username, 'y' => $tgl->format('Y'),
                'm' => $tgl->format('m'), 'd' => $tgl->format('d'),
                'title' => $blog->permalink, 'lang' => App::getLocale()]);

            \App\Models\Visitor::hit();
            return view('pages.blog.detail', compact('user', 'blog', 'relates', 'uri'));
        }
    }
}
