<?php

namespace App\Http\Controllers\Pages\Admins\DataMaster\Spec;

use App\Http\Controllers\Controller;
use App\Models\Finishing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FinishingController extends Controller
{
    public function show_data()
    {
        $data = Finishing::all();

        return view('pages.main.admins.dataMaster.spec.finisng', [
            'title' => 'Finishing Table',
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

        Finishing::create([
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
        return Finishing::find($id);
    }

    public function update_data(Request $request)
    {

        $category = Finishing::find($request->id);

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
        $data = Finishing::find(decrypt($id));

//        Storage::delete('public/products/specs/' . $post->image);
//
//        $post->delete();
//
//        return back()->with('success', __('admin.alert.blog.delete', ['param' => $post->title]));
        if ($data->isActive) {
            $data->update(['isActive' => false]);
            $message = 'Specs ['.$data->getTranslation('name', 'en').'] is successfully deactivated!';
        } else {
            $data->update(['isActive' => true]);
            $message = 'Specs ['.$data->getTranslation('name', 'en').'] is successfully activated!';
        }

        return back()->with('success', $message);
    }
}
