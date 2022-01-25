<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiDetail;
use App\Models\Barang;
use Session;

class TransaksiDetailController extends Controller
{
    public function index($id) {

        $username = session()->get('username');

        if ($username == "") {
            return redirect('/logout');
        }

        $data = DB::table('transaksi_detail as a')
                    ->select('a.*','b.nama_barang','c.status',DB::raw('REPLACE(FORMAT(a.harga,0),",",".") as harga_barang,REPLACE(FORMAT(a.harga*a.qty,0),",",".") as subtotal'))
                    ->leftJoin('barang as b','b.id','a.id_barang')
                    ->leftJoin('transaksi_master as c','c.id','a.id')
                    ->where('a.id',$id)
                    ->orderBy('a.created_at','ASC')
                    ->get();

        if ($data->count() == 0) {
            $status = 1;
        } else {
            $status = $data[0]->status;
        }

        return view('layout.transaksi_detail',['data' => $data, 'id' => $id, 'status' => $status, 'username' => $username]);
    }

    public function tambah($id) {

        $username = session()->get('username');

        if ($username == "") {
            return redirect('/logout');
        }

        $barang = Barang::all();

        return view('layout.transaksi_detail_tambah',['barang' => $barang, 'id' => $id, 'username' => $username]);

    }

    public function store(Request $request) {

        $username = session()->get('username');

        $arr_barang = explode('/',$request->id_barang);
        $id_barang = $arr_barang[0];

        $insert = TransaksiDetail::create([
                    'id' => $request->id,
                    'id_barang' => $id_barang,
                    'qty' => $request->qty,
                    'harga' => $request->harga
                ]);

        return redirect('/transaksi_detail/'.$request->id)->with('success','Data Added Successfully');
    }

    public function edit($id,$id_barang) {

        $username = session()->get('username');

        if ($username == "") {
            return redirect('/logout');
        }

        $data = TransaksiDetail::where('id',$id)->where('id_barang',$id_barang)->first();

        $brg = Barang::find($data->id_barang);
        $barang = Barang::where('id','<>',$data->id_barang)->get();

        return view('layout.transaksi_detail_edit',['data' => $data, 'id' => $id, 'brg' => $brg, 'barang' => $barang, 'username' => $username]);

    }

    public function update(Request $request) {

        $username = session()->get('username');

        DB::table('transaksi_detail')
            ->where('id',$request->id)
            ->where('id_barang',$request->id_barang)
            ->update([
                'qty' => $request->qty,
                'harga' => str_replace('.','',$request->harga)
            ]);

        return redirect('/transaksi_detail/'.$request->id)->with('success','Data Edited Successfully');

    }

     public function delete($id,$id_barang) {

        DB::table('transaksi_detail')
            ->where('id',$id)
            ->where('id_barang',$id_barang)
            ->delete();

        return redirect('/transaksi_detail/'.$id)->with('success','Data Deleted Successfully');

    }

}
