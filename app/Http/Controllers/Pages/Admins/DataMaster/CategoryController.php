<?php

namespace App\Http\Controllers\Pages\Admins\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function show_main()
    {
        $data = Kategori::all();

        return view('pages.main.admins.dataMaster.category.main', [
            'kategori' => $data
        ]);
    }

    public function createCategory(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = $request->file('thumbnail')->getClientOriginalName();
            Storage::delete('public/blog/thumbnail/' . $blog->thumbnail);
            $request->file('thumbnail')->storeAs('public/blog/thumbnail', $thumbnail);

        }

        Kategori::create([
            'name' => [
                'en' => $request->name,
                'id' => $request->name_id
            ],
            'caption' => [
                'en' => $request->_content_en,
                'id' => $request->_content_id
            ],
            'image' => $thumbnail
        ]);

        return back()->with('success', __('admin.alert.blog-category.create', ['param' => $request->name]));
    }

    public function editCategory($id)
    {
        return Kategori::find($id);
    }

    public function updateCategory(Request $request)
    {

        $category = Kategori::find($request->id);

        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = $request->file('thumbnail')->getClientOriginalName();
            Storage::delete('public/blog/thumbnail/' . $thumbnail);
            $request->file('thumbnail')->storeAs('public/blog/thumbnail', $thumbnail);

        } else {
            $thumbnail = $category->image;
        }
        $category->update([
            'name' => [
                'en' => $request->name_en,
                'id' => $request->name_id
            ],
            'caption' => [
                'en' => $request->_content_en,
                'id' => $request->_content_id
            ],
            'image' => $thumbnail
        ]);

        return back()->with('success', __('admin.alert.blog-category.update', ['param' => $category->name]));
    }

    public function deleteCategory($id)
    {
        $post = Kategori::find(decrypt($id));

        Storage::delete('public/blog/thumbnail/' . $post->image);

        $post->delete();

        return back()->with('success', __('admin.alert.blog.delete', ['param' => $post->title]));
    }
}
