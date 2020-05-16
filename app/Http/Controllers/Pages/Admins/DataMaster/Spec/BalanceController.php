<?php

namespace App\Http\Controllers\Pages\Admins\DataMaster\Spec;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BalanceController extends Controller
{
    public function show_data()
    {
        $data = Balance::all();

        return view('pages.main.admins.dataMaster.spec.balance', [
            'title' => 'Balances Table',
            'kategori' => $data
        ]);
    }

    public function create_data(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = uniqid().$request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/spec/', $thumbnail);

        }

        Balance::create([
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
        return Balance::find($id);
    }

    public function update_data(Request $request)
    {

        $category = Balance::find($request->id);

        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = uniqid().$request->file('thumbnail')->getClientOriginalName();;
            Storage::delete('public/spec/' . $thumbnail);
            $request->file('thumbnail')->storeAs('public/spec/', $thumbnail);

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
        $post = Balance::find(decrypt($id));

        Storage::delete('public/spec/' . $post->image);

        $post->delete();

        return back()->with('success', __('admin.alert.blog.delete', ['param' => $post->title]));
    }
}