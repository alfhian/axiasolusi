<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Supplier;
use Session;

class BarangController extends Controller
{
    public function index() {

        $username = session()->get('username');

        if ($username == "") {
            return redirect('/logout');
        }

        $data = DB::table('barang as a')
                    ->select('a.*','b.nama_supplier',DB::raw('REPLACE(FORMAT(a.harga,0),",",".") as harga_barang'))
                    ->leftJoin('supplier as b','b.id','a.id_supplier')
                    ->orderBy('a.id')
                    ->get();

        return view('layout.barang',['data' => $data, 'username' => $username]);
    }

    public function tambah() {

        $username = session()->get('username');

        if ($username == "") {
            return redirect('/logout');
        }

        $supplier = Supplier::all();

        return view('layout.barang_tambah',['supplier' => $supplier, 'username' => $username]);

    }

    public function store(Request $request) {

        $username = session()->get('username');

        $insert = Barang::create([
                    'nama_barang' => $request->nama_barang,
                    'harga' => str_replace('.','',$request->harga),
                    'id_supplier' => $request->id_supplier,
                    'user_input' => $username
                ]);

        return redirect('/barang')->with('success','Data Added Successfully');
    }

    public function edit($id) {

        $username = session()->get('username');

        if ($username == "") {
            return redirect('/logout');
        }

        $data = Barang::find($id);

        $splbrg = Supplier::find($data->id_supplier);
        $supplier = Supplier::where('id','<>',$data->id_supplier)->get();

        return view('layout.barang_edit',['data' => $data, 'splbrg' => $splbrg, 'supplier' => $supplier, 'username' => $username]);

    }

    public function update(Request $request) {

        $username = session()->get('username');

        $barang = Barang::find($request->id);

        $barang->nama_barang = $request->nama_barang;
        $barang->harga = str_replace('.','',$request->harga);
        $barang->id_supplier = $request->id_supplier;
        $barang->user_input = $username;
        $barang->save();

        return redirect('/barang')->with('success','Data Edited Successfully');

    }
}
