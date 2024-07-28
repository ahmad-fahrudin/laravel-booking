<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class TamuController extends Controller
{
    public function allTamu()
    {
        $tamu = Tamu::latest()->get();

        return view('admin.tamu.all_tamu', compact('tamu'));
    }

    public function addTamu()
    {
        return view('admin.tamu.add_tamu');
    }

    public function storeTamu(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:tamus|max:100',
            'phone' => 'required|max:100',
            'alamat' => 'required|max:400',
            'city' => 'required',
        ]);

        Tamu::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'alamat' => $request->alamat,
            'city' => $request->city,
            'created_at' => Carbon::now(),
        ]);

        $toastr = array(
            'success' => 'Data Tamu Inserted Successfully.'
        );

        return redirect()->route('all.tamu')->with($toastr);
    }

    public function editTamu($id)
    {
        $tamu = Tamu::findOrFail($id);

        return view('admin.tamu.edit_tamu', compact('tamu'));
    }

    public function updateTamu(Request $request)
    {
        $tamu_id = $request->id;

        Tamu::findOrFail($tamu_id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'alamat' => $request->alamat,
            'city' => $request->city,
        ]);

        $toastr = array(
            'success' => 'Tamu Data Updated.'
        );

        return redirect()->route('all.tamu')->with($toastr);
    }

    public function deleteTamu($id)
    {
        Tamu::findOrFail($id)->delete();
        $toastr = array(
            'success' => 'Successfuly Delete Data.'
        );
        return redirect()->back()->with($toastr);
    }
}
