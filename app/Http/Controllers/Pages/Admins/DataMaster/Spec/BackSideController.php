<?php

namespace App\Http\Controllers\Pages\Admins\DataMaster\Spec;

use App\Http\Controllers\Controller;
use App\Models\BackSide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackSideController extends Controller
{
    public function show_data()
    {
        $data = BackSide::all();

        return view('pages.main.admins.dataMaster.spec.backside', [
            'title' => 'Back Side Table',
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

        BackSide::create([
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

        return back()->with('success', 'Specs ['.$request->name_en.'] is successfully created!');
    }

    public function edit_data($id)
    {
        return BackSide::find($id);
    }

    public function update_data(Request $request)
    {

        $category = BackSide::find($request->id);

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

        return back()->with('success', 'Specs ['.$request->name_en.'] is successfully updated!');
    }

    public function delete_data($id)
    {
        $data = BackSide::find(decrypt($id));

//        Storage::delete('public/products/specs/' . $post->image);
//
//        $post->delete();

        if ($data->isActive) {
            $data->update(['isActive' => false]);
            $message = 'Specs ['.$data->getTranslation('name', 'en').'] is successfully deactivated!';
        } else {
            $data->update(['isActive' => true]);
            $message = 'Specs ['.$data->getTranslation('name', 'en').'] is successfully activated!';
        }

        return back()->with('success',$message);

//        return back()->with('success', __('admin.alert.blog.delete', ['param' => $post->title]));
    }
}
