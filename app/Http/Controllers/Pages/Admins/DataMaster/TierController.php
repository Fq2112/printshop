<?php

namespace App\Http\Controllers\Pages\Admins\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\PriceTier;
use App\Models\TypeTier;
use Illuminate\Http\Request;

class TierController extends Controller
{
    public function show()
    {
        $data = TypeTier::all();
        return view('pages.main.admins.tier',[
            'data' => $data
        ]);
    }

    public function add_type(Request $request)
    {
        try {
            TypeTier::query()->create([
                'name' => $request->name,
                'discount' => $request->discount
            ]);
            return back()->with('success', 'Data Added');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function update_type(Request $request)
    {
        try {
            $data = TypeTier::query()->find($request->id)->update([
                'name' => $request->name,
                'discount' => $request->discount
            ]);
            return back()->with('success', 'Data Updated');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function delete_type($id)
    {
        $data = TypeTier::query()->find(decrypt($id))->delete();

        return back()->with('success', 'Data deleted');
    }

    public function show_tier_list($id)
    {
        $data = TypeTier::query()->find(decrypt($id));

        return view('pages.main.admins.tier_list',[
            'data' => $data
        ]);
    }

    public function add_type_list(Request $request)
    {
        try {
            PriceTier::query()->create([
                'start' => $request->start,
                'end' => $request->end,
                'type_id' => $request->type_id
            ]);
            return back()->with('success', 'Data Added');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function update_type_list(Request $request)
    {
        try {
            $data = PriceTier::query()->find($request->id)->update([
                'start' => $request->start,
                'end' => $request->end
            ]);
            return back()->with('success', 'Data Updated');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function delete_type_list($id)
    {
        $data = PriceTier::query()->find(decrypt($id))->delete();

        return back()->with('success', 'Data deleted');
    }
}
