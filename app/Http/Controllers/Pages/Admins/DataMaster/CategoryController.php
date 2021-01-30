<?php

namespace App\Http\Controllers\Pages\Admins\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ClusterKategori;
use App\Models\DetailProduct;
use App\Models\DetailSubkat;
use App\Models\GalleryCluster;
use App\Models\GallerySubs;
use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPMailer\PHPMailer\Exception;

class CategoryController extends Controller
{
    public function show_main()
    {
        $data = Kategori::all()->sortByDesc('isActive');

        return view('pages.main.admins.dataMaster.category.main', [
            'kategori' => $data
        ]);
    }

    public function createCategory(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = $request->file('thumbnail')->getClientOriginalName();
//            Storage::delete('public/blog/thumbnail/' . $blog->thumbnail);
            $request->file('thumbnail')->storeAs('public/products/menu/', $thumbnail);

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
//            Storage::delete('public/blog/thumbnail/' . $thumbnail);
            $request->file('thumbnail')->storeAs('public/products/menu/', $thumbnail);

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

    public function deactivate_kategori($id)
    {
        $data = Kategori::find(decrypt($id));
        $message = '';
        if ($data->isActive) {
            $data->update([
                'isActive' => false
            ]);
            $message = 'Successfully deactivate data';
        } else {
            $data->update([
                'isActive' => true
            ]);

            $message = 'Successfully activate data';
        }

        return back()->with('success', $message);
    }

    public function show_subkategori()
    {
        $data = SubKategori::all()->sortByDesc('isActive');

        return view('pages.main.admins.dataMaster.category.subkat', [
            'kategori' => $data
        ]);
    }

    public function create_data(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = uniqid() . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/products/banner/', $thumbnail);
        } else {
            $thumbnail = "";
        }

        if ($request->hasFile('guidelines')) {
            $this->validate($request, ['guidelines' => 'required|mimes:jpg,jpeg,gif,png,rar,zip,pdf|max:5120']);
            $guidelines = uniqid() . $request->file('guidelines')->getClientOriginalName();
            $request->file('guidelines')->storeAs('public/products/guidelines/', $guidelines);
        } else {
            $guidelines = "";
        }

        $subkat = SubKategori::create([
            'kategoris_id' => $request->kategori_id,
            'is_featured' => $request->is_featured,
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
                'price' => $request->price,
                'weight' => $request->weight,
                'length' => $request->length,
                'width' => $request->width,
                'height' => $request->height
            ]);

            if ($request->has('material_id')) {
                $detail->update([
                    'is_material' => true,
                    'material_ids' => $request->material_id
                ]);
            }
            if ($request->has('type_id')) {
                $detail->update([
                    'is_type' => true,
                    'type_ids' => $request->type_id
                ]);
            }
            if ($request->has('balance_id')) {
                $detail->update([
                    'is_balance' => true,
                    'balance_ids' => $request->balance_id
                ]);
            }
            if ($request->has('page_id')) {
                $detail->update([
                    'is_page' => true,
                    'page_ids' => $request->page_id
                ]);
            }
            if ($request->has('copies_id')) {
                $detail->update([
                    'is_copies' => true,
                    'copies_ids' => $request->copies_id
                ]);
            }
            if ($request->has('size_id')) {
                $detail->update([
                    'is_size' => true,
                    'size_ids' => $request->size_id
                ]);
            }
            if ($request->has('lamination_id')) {
                $detail->update([
                    'is_lamination' => true,
                    'lamination_ids' => $request->lamination_id
                ]);
            }
            if ($request->has('side_id')) {
                $detail->update([
                    'is_side' => true,
                    'side_ids' => $request->side_id
                ]);
            }
            if ($request->has('edge_id')) {
                $detail->update([
                    'is_edge' => true,
                    'edge_ids' => $request->edge_id
                ]);
            }
            if ($request->has('color_id')) {
                $detail->update([
                    'is_color' => true,
                    'color_ids' => $request->color_id
                ]);
            }
            if ($request->has('front_side_id')) {
                $detail->update([
                    'is_front_side' => true,
                    'front_side_ids' => $request->front_side_id
                ]);
            }
            if ($request->has('back_side_id')) {
                $detail->update([
                    'is_back_side' => true,
                    'back_side_ids' => $request->back_side_id
                ]);
            }
            if ($request->has('right_side_id')) {
                $detail->update([
                    'is_right_side' => true,
                    'right_side_ids' => $request->right_side_id
                ]);
            }
            if ($request->has('left_side_id')) {
                $detail->update([
                    'is_left_side' => true,
                    'left_side_ids' => $request->left_side_id
                ]);
            }
            if ($request->has('front_cover_id')) {
                $detail->update([
                    'is_front_coder' => true,
                    'front_cover_ids' => $request->front_cover_id
                ]);
            }
            if ($request->has('back_cover_id')) {
                $detail->update([
                    'is_back_cover' => true,
                    'back_cover_ids' => $request->back_cover_id
                ]);
            }
            if ($request->has('binding_id')) {
                $detail->update([
                    'is_binding' => true,
                    'binding_ids' => $request->binding_id
                ]);
            }
            if ($request->has('print_method_id')) {
                $detail->update([
                    'is_print_method' => true,
                    'print_method_ids' => $request->print_method_id
                ]);
            }
            if ($request->has('type_tier_id')) {
                $detail->update([
                    'type_tier_id' => $request->type_tier_id
                ]);
            }
        }

        return back()->with('success', __('admin.alert.blog-category.create', ['param' => $request->name]));
    }

    public function editSubCategory($id)
    {
        $data = SubKategori::find($id);
        $banner_path = asset('storage/products/banner/' . $data->banner);
        $guideline = asset('storage/products/guidelines/' . $data->guidelines);
        return response()->json([
            'data' => $data,
            'detail' => $data->getSubkatSpecs,
            'banner_path' => $banner_path,
            'guideline' => Storage::exists('public/products/guidelines/' . $data->guidelines) ? $guideline : null
        ]);
    }

    public function update_data(Request $request)
    {
        $category = SubKategori::find($request->id);

        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = uniqid() . $request->file('thumbnail')->getClientOriginalName();
            Storage::delete('public/subkat/' . $category->banner);
            $request->file('thumbnail')->storeAs('public/products/banner/', $thumbnail);
        } else {
            $thumbnail = $category->banner;
        }

        if ($request->hasFile('guidelines')) {
            $this->validate($request, ['guidelines' => 'required|mimes:jpg,jpeg,gif,png,rar,zip,pdf|max:5120']);
            $guidelines = uniqid() . $request->file('guidelines')->getClientOriginalName();
            Storage::delete('public/subkat/guidelines/' . $category->guidelines);
            $request->file('guidelines')->storeAs('public/products/guidelines/', $guidelines);
        } else {
            $guidelines = $category->guidelines;
        }

        $category->update([
            'kategoris_id' => $request->kategori_id,
            'is_featured' => $request->is_featured,
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

        $detail = DetailSubkat::where('subkategori_id', $category->id)->first();
        if (!empty($detail)) {
            $detail->update([
                'subkategori_id' => $category->id,
                'unit_id' => 1,
                'price' => $request->price,
                'weight' => $request->weight,
                'length' => $request->length,
                'width' => $request->width,
                'height' => $request->height
            ]);

            if ($request->has('material_id')) {
                $detail->update([
                    'is_material' => true,
                    'material_ids' => $request->material_id
                ]);
            }
            if ($request->has('type_id')) {
                $detail->update([
                    'is_type' => true,
                    'type_ids' => $request->type_id
                ]);
            }
            if ($request->has('balance_id')) {
                $detail->update([
                    'is_balance' => true,
                    'balance_ids' => $request->balance_id
                ]);
            }
            if ($request->has('page_id')) {
                $detail->update([
                    'is_page' => true,
                    'page_ids' => $request->page_id
                ]);
            }
            if ($request->has('copies_id')) {
                $detail->update([
                    'is_copies' => true,
                    'copies_ids' => $request->copies_id
                ]);
            }
            if ($request->has('size_id')) {
                $detail->update([
                    'is_size' => true,
                    'size_ids' => $request->size_id
                ]);
            }
            if ($request->has('lamination_id')) {
                $detail->update([
                    'is_lamination' => true,
                    'lamination_ids' => $request->lamination_id
                ]);
            }
            if ($request->has('side_id')) {
                $detail->update([
                    'is_side' => true,
                    'side_ids' => $request->side_id
                ]);
            }
            if ($request->has('edge_id')) {
                $detail->update([
                    'is_edge' => true,
                    'edge_ids' => $request->edge_id
                ]);
            }
            if ($request->has('color_id')) {
                $detail->update([
                    'is_color' => true,
                    'color_ids' => $request->color_id
                ]);
            }
            if ($request->has('front_side_id')) {
                $detail->update([
                    'is_front_side' => true,
                    'front_side_ids' => $request->front_side_id
                ]);
            }
            if ($request->has('back_side_id')) {
                $detail->update([
                    'is_back_side' => true,
                    'back_side_ids' => $request->back_side_id
                ]);
            }
            if ($request->has('right_side_id')) {
                $detail->update([
                    'is_right_side' => true,
                    'right_side_ids' => $request->right_side_id
                ]);
            }
            if ($request->has('left_side_id')) {
                $detail->update([
                    'is_left_side' => true,
                    'left_side_ids' => $request->left_side_id
                ]);
            }
            if ($request->has('front_cover_id')) {
                $detail->update([
                    'is_front_coder' => true,
                    'front_cover_ids' => $request->front_cover_id
                ]);
            }
            if ($request->has('back_cover_id')) {
                $detail->update([
                    'is_back_cover' => true,
                    'back_cover_ids' => $request->back_cover_id
                ]);
            }
            if ($request->has('binding_id')) {
                $detail->update([
                    'is_binding' => true,
                    'binding_ids' => $request->binding_id
                ]);
            }
            if ($request->has('print_method_id')) {
                $detail->update([
                    'is_print_method' => true,
                    'print_method_ids' => $request->print_method_id
                ]);
            }
            if ($request->has('type_tier_id')) {
                $detail->update([
                    'type_tier_id' => $request->type_tier_id
                ]);
            }

        }

        return back()->with('success', __('admin.alert.blog-category.update', ['param' => $category->name]));

    }

    public function deactivate_sub($id)
    {
        $data = SubKategori::find(decrypt($id));
        $message = '';
        if ($data->isActive) {
            $data->update([
                'isActive' => false
            ]);
            $message = 'Successfully deactivate data';
        } else {
            $data->update([
                'isActive' => true
            ]);

            $message = 'Successfully activate data';
        }

        return back()->with('success', $message);
    }

    public function show_cluster()
    {
        $data = ClusterKategori::all()->sortByDesc('isActive');

        return view('pages.main.admins.dataMaster.category.cluster', [
            'kategori' => $data
        ]);
    }

    public function editcluster($id)
    {
        $data = ClusterKategori::find($id);
        $banner_path = asset('storage/products/banner/' . $data->banner);
        $thumnail = asset('storage/products/thumb/' . $data->thumbnail);
        return response()->json([
            'data' => $data,
            'detail' => $data->getClusterSpecs,
            'banner_path' => $banner_path,
            'thumbnail' => $thumnail
        ]);
    }

    public function create_data_cluster(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = uniqid() . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/products/thumb/', $thumbnail);
        } else {
            $thumbnail = "";
        }

        if ($request->hasFile('guidelines')) {
            $this->validate($request, ['guidelines' => 'required|mimes:jpg,jpeg,gif,png,rar,zip,pdf|max:5120']);
            $guidelines = uniqid() . $request->file('guidelines')->getClientOriginalName();
            $request->file('guidelines')->storeAs('public/products/guidelines/', $guidelines);
        } else {
            $guidelines = "";
        }

        if ($request->hasFile('banner')) {
            $this->validate($request, ['banner' => 'required|image|mimes:jpg,jpeg,gif,png,rar,zip,pdf|max:5120']);
            $banner = uniqid() . $request->file('banner')->getClientOriginalName();
            $request->file('banner')->storeAs('public/products/banner/', $banner);
        } else {
            $banner = "";
        }

        $subkat = ClusterKategori::create([
            'subkategori_id' => $request->kategori_id,
            'is_featured' => $request->is_featured,
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
            'thumbnail' => $thumbnail,
            'banner' => $banner,
            'features' => [
                'en' => $request->_feature_en,
                'id' => $request->_feature_id
            ]
        ]);

        if ($request->has('advance')) {
            $detail = DetailProduct::create([
                'cluster_kategoris_id' => $subkat->id,
                'unit_id' => 1,
                'price' => $request->price,
                'weight' => $request->weight,
                'length' => $request->length,
                'width' => $request->width,
                'height' => $request->height
            ]);

            if ($request->has('material_id')) {
                $detail->update([
                    'is_material' => true,
                    'material_ids' => $request->material_id
                ]);
            }
            if ($request->has('type_id')) {
                $detail->update([
                    'is_type' => true,
                    'type_ids' => $request->type_id
                ]);
            }
            if ($request->has('balance_id')) {
                $detail->update([
                    'is_balance' => true,
                    'balance_ids' => $request->balance_id
                ]);
            }
            if ($request->has('page_id')) {
                $detail->update([
                    'is_page' => true,
                    'page_ids' => $request->page_id
                ]);
            }
            if ($request->has('copies_id')) {
                $detail->update([
                    'is_copies' => true,
                    'copies_ids' => $request->copies_id
                ]);
            }
            if ($request->has('size_id')) {
                $detail->update([
                    'is_size' => true,
                    'size_ids' => $request->size_id
                ]);
            }
            if ($request->has('lamination_id')) {
                $detail->update([
                    'is_lamination' => true,
                    'lamination_ids' => $request->lamination_id
                ]);
            }
            if ($request->has('side_id')) {
                $detail->update([
                    'is_side' => true,
                    'side_ids' => $request->side_id
                ]);
            }
            if ($request->has('edge_id')) {
                $detail->update([
                    'is_edge' => true,
                    'edge_ids' => $request->edge_id
                ]);
            }
            if ($request->has('color_id')) {
                $detail->update([
                    'is_color' => true,
                    'color_ids' => $request->color_id
                ]);
            }
            if ($request->has('front_side_id')) {
                $detail->update([
                    'is_front_side' => true,
                    'front_side_ids' => $request->front_side_id
                ]);
            }
            if ($request->has('back_side_id')) {
                $detail->update([
                    'is_back_side' => true,
                    'back_side_ids' => $request->back_side_id
                ]);
            }
            if ($request->has('right_side_id')) {
                $detail->update([
                    'is_right_side' => true,
                    'right_side_ids' => $request->right_side_id
                ]);
            }
            if ($request->has('left_side_id')) {
                $detail->update([
                    'is_left_side' => true,
                    'left_side_ids' => $request->left_side_id
                ]);
            }
            if ($request->has('front_cover_id')) {
                $detail->update([
                    'is_front_coder' => true,
                    'front_cover_ids' => $request->front_cover_id
                ]);
            }
            if ($request->has('back_cover_id')) {
                $detail->update([
                    'is_back_cover' => true,
                    'back_cover_ids' => $request->back_cover_id
                ]);
            }
            if ($request->has('binding_id')) {
                $detail->update([
                    'is_binding' => true,
                    'binding_ids' => $request->binding_id
                ]);
            }
            if ($request->has('print_method_id')) {
                $detail->update([
                    'is_print_method' => true,
                    'print_method_ids' => $request->print_method_id
                ]);
            }
            if ($request->has('type_tier_id')) {
                $detail->update([
                    'type_tier_id' => $request->type_tier_id
                ]);
            }
        }

        return back()->with('success', __('admin.alert.blog-category.create', ['param' => $request->name]));
    }

    public function update_data_cluster(Request $request)
    {

        $cluster = ClusterKategori::find($request->id);

        if ($request->hasFile('thumbnail')) {
            $this->validate($request, ['thumbnail' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = uniqid() . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/products/thumb/', $thumbnail);
        } else {
            $thumbnail = $cluster->thumbnail;
        }

        if ($request->hasFile('guidelines')) {
            $this->validate($request, ['guidelines' => 'required|mimes:jpg,jpeg,gif,png,rar,zip,pdf|max:5120']);
            $guidelines = uniqid() . $request->file('guidelines')->getClientOriginalName();
            $request->file('guidelines')->storeAs('public/products/guidelines/', $guidelines);
        } else {
            $guidelines = "";
        }

        if ($request->hasFile('banner')) {
            $this->validate($request, ['banner' => 'required|image|mimes:jpg,jpeg,gif,png,rar,zip,pdf|max:5120']);
            $banner = uniqid() . $request->file('banner')->getClientOriginalName();
            $request->file('banner')->storeAs('public/products/banner/', $banner);
        } else {
            $banner = $cluster->banner;
        }

        $cluster->update([
            'subkategori_id' => $request->kategori_id,
            'is_featured' => $request->is_featured,
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
            'thumbnail' => $thumbnail,
            'banner' => $banner,
            'features' => [
                'en' => $request->_feature_en,
                'id' => $request->_feature_id
            ]
        ]);

        $detail = DetailProduct::where('cluster_kategoris_id', $cluster->id)->first();
        if (!empty($detail)) {
            $detail->update([
                'cluster_kategoris_id' => $cluster->id,
                'unit_id' => 1,
                'price' => $request->price,
                'weight' => $request->weight,
                'length' => $request->length,
                'width' => $request->width,
                'height' => $request->height
            ]);

            if ($request->has('material_id')) {
                $detail->update([
                    'is_material' => true,
                    'material_ids' => $request->material_id
                ]);
            }
            if ($request->has('type_id')) {
                $detail->update([
                    'is_type' => true,
                    'type_ids' => $request->type_id
                ]);
            }
            if ($request->has('balance_id')) {
                $detail->update([
                    'is_balance' => true,
                    'balance_ids' => $request->balance_id
                ]);
            }
            if ($request->has('page_id')) {
                $detail->update([
                    'is_page' => true,
                    'page_ids' => $request->page_id
                ]);
            }
            if ($request->has('copies_id')) {
                $detail->update([
                    'is_copies' => true,
                    'copies_ids' => $request->copies_id
                ]);
            }
            if ($request->has('size_id')) {
                $detail->update([
                    'is_size' => true,
                    'size_ids' => $request->size_id
                ]);
            }
            if ($request->has('lamination_id')) {
                $detail->update([
                    'is_lamination' => true,
                    'lamination_ids' => $request->lamination_id
                ]);
            }
            if ($request->has('side_id')) {
                $detail->update([
                    'is_side' => true,
                    'side_ids' => $request->side_id
                ]);
            }
            if ($request->has('edge_id')) {
                $detail->update([
                    'is_edge' => true,
                    'edge_ids' => $request->edge_id
                ]);
            }
            if ($request->has('color_id')) {
                $detail->update([
                    'is_color' => true,
                    'color_ids' => $request->color_id
                ]);
            }
            if ($request->has('front_side_id')) {
                $detail->update([
                    'is_front_side' => true,
                    'front_side_ids' => $request->front_side_id
                ]);
            }
            if ($request->has('back_side_id')) {
                $detail->update([
                    'is_back_side' => true,
                    'back_side_ids' => $request->back_side_id
                ]);
            }
            if ($request->has('right_side_id')) {
                $detail->update([
                    'is_right_side' => true,
                    'right_side_ids' => $request->right_side_id
                ]);
            }
            if ($request->has('left_side_id')) {
                $detail->update([
                    'is_left_side' => true,
                    'left_side_ids' => $request->left_side_id
                ]);
            }
            if ($request->has('front_cover_id')) {
                $detail->update([
                    'is_front_coder' => true,
                    'front_cover_ids' => $request->front_cover_id
                ]);
            }
            if ($request->has('back_cover_id')) {
                $detail->update([
                    'is_back_cover' => true,
                    'back_cover_ids' => $request->back_cover_id
                ]);
            }
            if ($request->has('binding_id')) {
                $detail->update([
                    'is_binding' => true,
                    'binding_ids' => $request->binding_id
                ]);
            }
            if ($request->has('print_method_id')) {
                $detail->update([
                    'is_print_method' => true,
                    'print_method_ids' => $request->print_method_id
                ]);
            }
            if ($request->has('type_tier_id')) {
                $detail->update([
                    'type_tier_id' => $request->type_tier_id
                ]);
            }
        }
        return back()->with('success', __('admin.alert.blog-category.create', ['param' => $request->name]));
    }


    public function deactivate_cluster($id)
    {
        $data = ClusterKategori::find(decrypt($id));
        $message = '';
        if ($data->isActive) {
            $data->update([
                'isActive' => false
            ]);
            $message = 'Successfully deactivate data';
        } else {
            $data->update([
                'isActive' => true
            ]);

            $message = 'Successfully activate data';
        }

        return back()->with('success', $message);
    }

    public function show_gallery_subs($id)
    {
        $data = SubKategori::find(decrypt($id));

        return view('pages.main.admins.dataMaster.category.gallery_subs', [
            'data' => $data
        ]);
    }

    public function add_gallery_subs(Request $request)
    {
        try {
            foreach ($request->file('photos') as $file) {
                $photo = uniqid() . $file->getClientOriginalName();
                $file->storeAs('public/products/gallery/', $photo);

                GallerySubs::create([
                    'subkategori_id' => $request->subkategori_id,
                    'image' => $photo
                ]);
            }
            return back()->with('success', 'Banner Photo Successfully Added');
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }


    public function delete_gallery_subs($id)
    {
        try {
            $data = GallerySubs::find($id);
            $data->delete();
            return back()->with('success', 'Banner Photo Successfully Removed');

        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function show_gallery_cluster($id)
    {
        $data = ClusterKategori::find(decrypt($id));

        return view('pages.main.admins.dataMaster.category.gallery_cluster', [
            'data' => $data
        ]);
    }

    public function add_gallery_clust(Request $request)
    {
        try {
            foreach ($request->file('photos') as $file) {
                $photo = uniqid() . $file->getClientOriginalName();
                $file->storeAs('public/products/gallery/', $photo);

                GalleryCluster::create([
                    'cluster_id' => $request->cluster_id,
                    'image' => $photo
                ]);
            }
            return back()->with('success', 'Banner Photo Successfully Added');
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function delete_gallery_cluster($id)
    {
        try {
            $data = GalleryCluster::find($id);
            $data->delete();
            return back()->with('success', 'Banner Photo Successfully Removed');

        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }
}
