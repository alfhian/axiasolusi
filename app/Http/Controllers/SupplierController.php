<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;
use Session;

class SupplierController extends Controller
{
    public function index() {

        $username = session()->get('username');

        if ($username == "") {
            return redirect('/logout');
        }

        $data = DB::table('supplier')
                    ->select('*')
                    ->orderBy('id')
                    ->get();

        return view('layout.supplier',['data' => $data, 'username' => $username]);
    }

    public function tambah() {

        $username = session()->get('username');

        if ($username == "") {
            return redirect('/logout');
        }

        return view('layout.supplier_tambah',['username' => $username]);

    }

    public function store(Request $request) {

        $username = session()->get('username');

        $insert = Supplier::create([
                    'nama_supplier' => $request->nama_supplier,
                    'pic' => $request->pic,
                    'telp' => $request->telp,
                    'alamat' => $request->alamat,
                    'user_input' => $username
                ]);

        return redirect('/supplier')->with('success','Data Added Successfully');
    }

    public function edit($id) {

        $username = session()->get('username');

        if ($username == "") {
            return redirect('/logout');
        }

        $data = Supplier::find($id);

        return view('layout.supplier_edit',['data' => $data, 'username' => $username]);

    }

    public function update(Request $request) {

        $username = session()->get('username');

        $supplier = Supplier::find($request->id);

        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->pic = $request->pic;
        $supplier->telp = $request->telp;
        $supplier->alamat = $request->alamat;
        $supplier->user_input = $username;
        $supplier->save();

        return redirect('/supplier')->with('success','Data Edited Successfully');

    }

}
