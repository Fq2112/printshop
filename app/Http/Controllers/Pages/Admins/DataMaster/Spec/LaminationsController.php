<?php

namespace App\Http\Controllers\Pages\Admins\DataMaster\Spec;

use App\Http\Controllers\Controller;
use App\Models\Lamination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaminationsController extends Controller
{
    public function show_data()
    {
        $data = Lamination::all();

        return view('pages.main.admins.dataMaster.spec.front', [
            'title' => 'Lamination Table',
            'kategori' => $data
        ]);
    }

    public function create_data(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = uniqid().$request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/products/specs/', $thumbnail);

        }

        Front::create([
            'name' => [
                'en' => $request->name_en,
                'id' => $request->name_id
            ],
            'description' => [
                'en' => $request->_content_en,
                'id' => $request->_content_id
            ],
            'image' => $thumbnail,
            'price' => $request->price
        ]);

        return back()->with('success', __('admin.alert.blog-category.create', ['param' => $request->name]));
    }

    public function edit_data($id)
    {
        return Lamination::find($id);
    }

    public function update_data(Request $request)
    {

        $category = Lamination::find($request->id);

        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = uniqid().$request->file('thumbnail')->getClientOriginalName();;
            Storage::delete('public/products/specs/' . $thumbnail);
            $request->file('thumbnail')->storeAs('public/products/specs/', $thumbnail);

        } else {
            $thumbnail = $category->image;
        }
        $category->update([
            'name' => [
                'en' => $request->name_en,
                'id' => $request->name_id
            ],
            'description' => [
                'en' => $request->_content_en,
                'id' => $request->_content_id
            ],
            'image' => $thumbnail,
            'price' => $request->price
        ]);

        return back()->with('success', __('admin.alert.blog-category.update', ['param' => $category->name]));
    }

    public function delete_data($id)
    {
        $post = Lamination::find(decrypt($id));

        Storage::delete('public/products/specs/' . $post->image);

        $post->delete();

        return back()->with('success', __('admin.alert.blog.delete', ['param' => $post->title]));
    }
}
