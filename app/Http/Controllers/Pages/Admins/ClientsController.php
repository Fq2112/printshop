<?php

namespace App\Http\Controllers\Pages\Admins;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientsController extends Controller
{
    public function show_clients()
    {
        $data = Clients::all();

        return view('pages.main.admins.clients', [
            'title' => 'Client ' . env('APP_NAME') . ' List',
            'kategori' => $data
        ]);
    }

    public function create_data(Request $request)
    {
        $this->validate($request, ['logo' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
        $logo = $request->file('logo')->getClientOriginalName();
        $request->file('logo')->storeAs('public/clients/', $logo);

        Clients::create([
            'name' => $request->name,
            'logo' => $logo
        ]);

        return back()->with('success', 'Client ['.$request->name.'] is successfully created!');
    }

    public function update_data(Request $request)
    {
        $client = Clients::find($request->id);
        $logo = $client->logo;

        if ($request->hasFile('logo')) {
            $this->validate($request, ['logo' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $logo = $request->file('logo')->getClientOriginalName();
            Storage::delete('public/clients/' . $client->logo);
            $request->file('logo')->storeAs('public/clients/', $logo);
        }

        $client->update([
            'name' => $request->name,
            'logo' => $logo
        ]);

        return back()->with('success', 'Client ['.$client->name.'] is successfully updated!');

    }

    public function delete_data($id)
    {
        $client = Clients::find(decrypt($id));
        $client->delete();

        return back()->with('success', 'Client ['.$client->name.'] is successfully deleted!');
    }
}
