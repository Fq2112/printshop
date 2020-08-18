<?php

namespace App\Http\Controllers\Pages\Admins\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function showBlogCategoriesTable()
    {
        $categories = BlogCategory::orderBy('name')->get();

        return view('pages.main.admins.dataMaster.blog.category-table', compact('categories'));
    }

    public function createBlogCategories(Request $request)
    {
        BlogCategory::create(['name' => $request->name]);

        return back()->with('success', __('admin.alert.blog-category.create', ['param' => $request->name]));
    }

    public function updateBlogCategories(Request $request)
    {
        $category = BlogCategory::find($request->id);
        $category->update(['name' => $request->name]);

        return back()->with('success', __('admin.alert.blog-category.update', ['param' => $category->name]));
    }

    public function deleteBlogCategories($id)
    {
        $category = BlogCategory::find(decrypt($id));
        $category->delete();

        return back()->with('success', __('admin.alert.blog-category.delete', ['param' => $category->name]));
    }

    public function massDeleteBlogCategories(Request $request)
    {
        $categories = BlogCategory::whereIn('id', explode(",", $request->category_ids))->get();
        foreach ($categories as $category) {
            $category->delete();
        }

        if(app()->isLocale('en')){
            $message = count($categories) > 1 ? count($categories) . ' blog categories are' : count($categories) . ' blog category is';
        } else {
            $message = count($categories).' kategori blog';
        }

        return back()->with('success', __('admin.alert.mass-delete', ['param' => $message]));
    }

    public function showBlogPostsTable(Request $request)
    {
        $categories = BlogCategory::all();
        if(Auth::guard('admin')->user()->isOwner()){
            $posts = Blog::all();

        } else {
            $posts = Blog::where('admin_id', Auth::guard('admin')->id())->get();
        }

        if($request->has('q')){
            $find = $request->q;
        } else {
            $find = null;
        }

        return view('pages.main.admins.dataMaster.blog.post-table', compact('categories', 'posts', 'find'));
    }

    public function createBlogPosts(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/blog/thumbnail', $thumbnail);
        } else {
            $thumbnail = null;
        }

        $blog = Blog::create([
            'admin_id' => Auth::guard('admin')->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'permalink' => preg_replace("![^a-z0-9]+!i", "-", strtolower($request->title)),
            'content' => $request->_content,
            'thumbnail' => $thumbnail,
        ]);

        if ($request->hasFile('photos')) {
            $this->validate($request, ['photos' => 'array', 'photos.*' => 'image|mimes:jpg,jpeg,gif,png|max:5120']);
            foreach ($request->file('photos') as $file) {
                $photo = $file->getClientOriginalName();
                $file->storeAs('public/blog', $photo);

                BlogGallery::create([
                    'blog_id' => $blog->id,
                    'type' => 'photos',
                    'files' => $photo
                ]);
            }
        }

        if ($request->has('videos') && $request->videos != "") {
            foreach (explode(',',$request->videos) as $video) {
                BlogGallery::create([
                    'blog_id' => $blog->id,
                    'type' => 'videos',
                    'files' => $video
                ]);
            }
        }

        return back()->with('success', __('admin.alert.blog.create', ['param' => $blog->title]));
    }

    public function editBlogPosts($id)
    {
        return Blog::find($id);
    }

    public function getBlogGalleries(Request $request)
    {
        $blog = Blog::find($request->id);

        return array(
            'title' => $blog->title,
            'thumbnail' => asset('storage/blog/thumbnail/'.$blog->thumbnail),
            'gallery' => $blog->getBlogGallery
        );
    }

    public function updateBlogPosts(Request $request)
    {
        $blog = Blog::find($request->id);

        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = $request->file('thumbnail')->getClientOriginalName();
            Storage::delete('public/blog/thumbnail/'.$blog->thumbnail);
            $request->file('thumbnail')->storeAs('public/blog/thumbnail', $thumbnail);

        } else {
            $thumbnail = $blog->thumbnail;
        }

        $blog->update([
            'admin_id' => $blog->admin_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'permalink' => preg_replace("![^a-z0-9]+!i", "-", strtolower($request->title)),
            'content' => $request->_content,
            'thumbnail' => $thumbnail,
        ]);

        return back()->with('success', __('admin.alert.blog.update', ['param' => $blog->title]));
    }

    public function deleteBlogPosts($id)
    {
        $post = Blog::find(decrypt($id));

        Storage::delete('public/blog/thumbnail/'.$post->thumbnail);
        if($post->getBlogGallery->count() > 0){
            foreach($post->getBlogGallery as $row){
                if($row->type == "photos"){
                    Storage::delete('public/blog/'.$row->files);
                }
            }
        }

        $post->delete();

        return back()->with('success', __('admin.alert.blog.delete', ['param' => $post->title]));
    }

    public function massDeleteBlogPosts(Request $request)
    {
        $posts = Blog::whereIn('id', explode(",", $request->post_ids))->get();
        foreach ($posts as $post) {
            Storage::delete('public/blog/thumbnail/'.$post->thumbnail);
            if($post->getBlogGallery->count() > 0){
                foreach($post->getBlogGallery as $row){
                    if($row->type == "photos"){
                        Storage::delete('public/blog/'.$row->files);
                    }
                }
            }

            $post->delete();
        }

        if(app()->isLocale('en')){
            $message = count($posts) > 1 ? count($posts) . ' blog posts are' : count($posts) . ' blog post is';
        } else {
            $message = count($posts).' postingan blog';
        }

        return back()->with('success', __('admin.alert.mass-delete', ['param' => $message]));
    }

    public function showBlogGalleriesTable($blog_id)
    {
        $blog = Blog::find(decrypt($blog_id));

        return view('pages.main.admins.dataMaster.blog.gallery-table', compact('blog'));
    }

    public function updateBlogGalleries(Request $request)
    {
        $blog = Blog::find(decrypt($request->blog_id));
        $count = 0;

        if ($request->hasFile('photos')) {
            $this->validate($request, ['photos' => 'array', 'photos.*' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            foreach ($request->file('photos') as $file) {
                $photo = $file->getClientOriginalName();
                $file->storeAs('public/blog', $photo);

                BlogGallery::create([
                    'blog_id' => $blog->id,
                    'type' => 'photos',
                    'files' => $photo
                ]);
            }

            $count += count($request->photos);
        }

        if ($request->has('videos') && $request->videos != "") {
            foreach (explode(',',$request->videos) as $video) {
                BlogGallery::create([
                    'blog_id' => $blog->id,
                    'type' => 'videos',
                    'files' => $video
                ]);
            }

            $count += count(explode(',',$request->videos));
        }

        if(app()->isLocale('en')){
            $message = $count > 1 ? $count . ' files are' : $count . ' file is';
        } else {
            $message = $count.' file';
        }

        return back()->with('success', __('admin.alert.blog-gallery.update', ['param' => $message, 'param2' => $blog->title]));
    }

    public function deleteBlogGalleries(Request $request)
    {
        $blog = Blog::find(decrypt($request->blog_id));
        $gallery = BlogGallery::find(decrypt($request->id));

        if($gallery->type == "photos"){
            Storage::delete('public/blog/'.$gallery->files);
        }

        $gallery->delete();

        return back()->with('success', __('admin.alert.blog-gallery.delete', ['param' => $gallery->files, 'param2' => $blog->title]));
    }

    public function massDeleteBlogGalleries(Request $request)
    {
        $blog = Blog::find(decrypt($request->blog_id));
        $galleries = BlogGallery::whereIn('id', explode(",", $request->gallery_ids))->get();
        foreach ($galleries as $gallery) {
            if($gallery->type == "photos"){
                Storage::delete('public/blog/'.$gallery->files);
            }

            $gallery->delete();
        }

        if(app()->isLocale('en')){
            $message = count($galleries) > 1 ? count($galleries) . ' files are' : count($galleries) . ' file is';
        } else {
            $message = count($galleries).' file';
        }

        return back()->with('success', __('admin.alert.blog-gallery.mass-delete', ['param' => $message, 'param2' => $blog->title]));
    }
}
