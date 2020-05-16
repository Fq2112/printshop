<?php

namespace App\Http\Controllers\Pages\Admins\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\DetailSubkat;
use App\Models\Kategori;
use App\Models\SubKategori;
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

    public function show_subkategori()
    {
        $data = SubKategori::all();

        return view('pages.main.admins.dataMaster.category.subkat', [
            'kategori' => $data
        ]);
    }

    public function create_data(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = uniqid() . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/subkat/', $thumbnail);
        } else {
            $thumbnail = "";
        }

        if ($request->hasFile('guidelines')) {
            $this->validate($request, ['guidelines' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $guidelines = uniqid() . $request->file('guidelines')->getClientOriginalName();
            $request->file('guidelines')->storeAs('public/subkat/guidelines/', $guidelines);
        } else {
            $guidelines = "";
        }

        $subkat = SubKategori::create([
            'kategoris_id' => $request->kategori_id,
            'name' => [
                'en' => $request->name_en,
                'id' => $request->name_id
            ],
            'caption' => [
                'en' => $request->_content_en,
                'id' => $request->_content_id
            ],
            'permalink' => [
                'id' => preg_replace("![^a-z0-9]+!i", "-", strtolower($request->name_id)),
                'en' => preg_replace("![^a-z0-9]+!i", "-", strtolower($request->name_en)),
            ],
            'banner' => $thumbnail,
            'guidelines' => $guidelines
        ]);

        if ($request->has('advance')) {
            $detail = DetailSubkat::create([
                'subkategori_id' => $subkat->id,
                'unit_id' => 1,
                'price' => $request->price
            ]);

            if ($request->has('material_id')){
                $detail->update([
                    'is_material' => true,
                    'material_ids' => $request->material_id
                ]);
            }
            if ($request->has('type_id')){
                $detail->update([
                    'is_type' => true,
                    'type_ids' => $request->type_id
                ]);
            }
            if ($request->has('balance_id')){
                $detail->update([
                    'is_balance' => true,
                    'balance_ids' => $request->balance_id
                ]);
            }
            if ($request->has('page_id')){
                $detail->update([
                    'is_page' => true,
                    'page_ids' => $request->page_id
                ]);
            }
            if ($request->has('copies_id')){
                $detail->update([
                    'is_copies' => true,
                    'copies_ids' => $request->copies_id
                ]);
            }
            if ($request->has('size_id')){
                $detail->update([
                    'is_size' => true,
                    'size_ids' => $request->size_id
                ]);
            }
            if ($request->has('lamination_id')){
                $detail->update([
                    'is_lamination' => true,
                    'lamination_ids' => $request->lamination_id
                ]);
            }
            if ($request->has('side_id')){
                $detail->update([
                    'is_side' => true,
                    'side_ids' => $request->side_id
                ]);
            }
            if ($request->has('edge_id')){
                $detail->update([
                    'is_edge' => true,
                    'edge_ids' => $request->edge_id
                ]);
            }
            if ($request->has('color_id')){
                $detail->update([
                    'is_color' => true,
                    'color_ids' => $request->color_id
                ]);
            }
            if ($request->has('front_side_id')){
                $detail->update([
                    'is_front_side' => true,
                    'front_side_ids' => $request->front_side_id
                ]);
            }
            if ($request->has('back_side_id')){
                $detail->update([
                    'is_back_side' => true,
                    'back_side_ids' => $request->back_side_id
                ]);
            }
            if ($request->has('right_side_id')){
                $detail->update([
                    'is_right_side' => true,
                    'right_side_ids' => $request->right_side_id
                ]);
            }
            if ($request->has('left_side_id')){
                $detail->update([
                    'is_left_side' => true,
                    'left_side_ids' => $request->left_side_id
                ]);
            }
            if ($request->has('front_cover_id')){
                $detail->update([
                    'is_front_coder' => true,
                    'front_cover_ids' => $request->front_cover_id
                ]);
            }
            if ($request->has('back_cover_id')){
                $detail->update([
                    'is_back_cover' => true,
                    'back_cover_ids' => $request->back_cover_id
                ]);
            }
            if ($request->has('binding_id')){
                $detail->update([
                    'is_binding' => true,
                    'binding_ids' => $request->binding_id
                ]);
            }
            if ($request->has('print_method_id')){
                $detail->update([
                    'is_print_method' => true,
                    'print_method_ids' => $request->print_method_id
                ]);
            }
        }

        return back()->with('success', __('admin.alert.blog-category.create', ['param' => $request->name]));
    }

    public function editSubCategory($id)
    {
        $data = SubKategori::find($id);
        return response()->json([
            'data' => $data,
            'detail' => $data->getSubkatSpecs

        ]);
    }

    public function update_data(Request $request)
    {
        $category = SubKategori::find($request->id);

        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = uniqid() . $request->file('thumbnail')->getClientOriginalName();
            Storage::delete('public/subkat/' . $category->banner);
            $request->file('thumbnail')->storeAs('public/subkat/', $thumbnail);
        } else {
            $thumbnail = "";
        }

        if ($request->hasFile('guidelines')) {
            $this->validate($request, ['guidelines' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $guidelines = uniqid() . $request->file('guidelines')->getClientOriginalName();
            Storage::delete('public/subkat/guidelines/' . $category->guidelines);
            $request->file('guidelines')->storeAs('public/subkat/guidelines/', $guidelines);
        } else {
            $guidelines = "";
        }

        $category->update([
            'kategoris_id' => $request->kategori_id,
            'name' => [
                'en' => $request->name_en,
                'id' => $request->name_id
            ],
            'caption' => [
                'en' => $request->_content_en,
                'id' => $request->_content_id
            ],
            'permalink' => [
                'id' => preg_replace("![^a-z0-9]+!i", "-", strtolower($request->name_id)),
                'en' => preg_replace("![^a-z0-9]+!i", "-", strtolower($request->name_en)),
            ],
            'banner' => $thumbnail,
            'guidelines' => $guidelines
        ]);

        $detail = DetailSubkat::where('subkategori_id',$category->id)->first();
        if (!empty($detail)){
                $detail->update([
                    'subkategori_id' => $category->id,
                    'unit_id' => 1,
                    'price' => $request->price
                ]);

                if ($request->has('material_id')){
                    $detail->update([
                        'is_material' => true,
                        'material_ids' => $request->material_id
                    ]);
                }
                if ($request->has('type_id')){
                    $detail->update([
                        'is_type' => true,
                        'type_ids' => $request->type_id
                    ]);
                }
                if ($request->has('balance_id')){
                    $detail->update([
                        'is_balance' => true,
                        'balance_ids' => $request->balance_id
                    ]);
                }
                if ($request->has('page_id')){
                    $detail->update([
                        'is_page' => true,
                        'page_ids' => $request->page_id
                    ]);
                }
                if ($request->has('copies_id')){
                    $detail->update([
                        'is_copies' => true,
                        'copies_ids' => $request->copies_id
                    ]);
                }
                if ($request->has('size_id')){
                    $detail->update([
                        'is_size' => true,
                        'size_ids' => $request->size_id
                    ]);
                }
                if ($request->has('lamination_id')){
                    $detail->update([
                        'is_lamination' => true,
                        'lamination_ids' => $request->lamination_id
                    ]);
                }
                if ($request->has('side_id')){
                    $detail->update([
                        'is_side' => true,
                        'side_ids' => $request->side_id
                    ]);
                }
                if ($request->has('edge_id')){
                    $detail->update([
                        'is_edge' => true,
                        'edge_ids' => $request->edge_id
                    ]);
                }
                if ($request->has('color_id')){
                    $detail->update([
                        'is_color' => true,
                        'color_ids' => $request->color_id
                    ]);
                }
                if ($request->has('front_side_id')){
                    $detail->update([
                        'is_front_side' => true,
                        'front_side_ids' => $request->front_side_id
                    ]);
                }
                if ($request->has('back_side_id')){
                    $detail->update([
                        'is_back_side' => true,
                        'back_side_ids' => $request->back_side_id
                    ]);
                }
                if ($request->has('right_side_id')){
                    $detail->update([
                        'is_right_side' => true,
                        'right_side_ids' => $request->right_side_id
                    ]);
                }
                if ($request->has('left_side_id')){
                    $detail->update([
                        'is_left_side' => true,
                        'left_side_ids' => $request->left_side_id
                    ]);
                }
                if ($request->has('front_cover_id')){
                    $detail->update([
                        'is_front_coder' => true,
                        'front_cover_ids' => $request->front_cover_id
                    ]);
                }
                if ($request->has('back_cover_id')){
                    $detail->update([
                        'is_back_cover' => true,
                        'back_cover_ids' => $request->back_cover_id
                    ]);
                }
                if ($request->has('binding_id')){
                    $detail->update([
                        'is_binding' => true,
                        'binding_ids' => $request->binding_id
                    ]);
                }
                if ($request->has('print_method_id')){
                    $detail->update([
                        'is_print_method' => true,
                        'print_method_ids' => $request->print_method_id
                    ]);
                }

        }

        return back()->with('success', __('admin.alert.blog-category.update', ['param' => $category->name]));

    }
}
