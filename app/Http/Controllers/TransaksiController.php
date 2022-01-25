<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiMaster;
use App\Models\TransaksiDetail;
use Session;

class TransaksiController extends Controller
{
    public function index() {

        $username = session()->get('username');

        if ($username == "") {
            return redirect('/logout');
        }

        $data = DB::table('transaksi_master as a')
                    ->select('a.*',DB::raw('COUNT(b.id_barang) as jumlah,REPLACE(FORMAT(SUM(b.harga*b.qty),0),",",".") as total,IF(a.status = 1,"INPUT","POSTED") as stat'))
                    ->leftJoin('transaksi_detail as b','b.id','a.id')
                    ->groupBy('a.id')
                    ->orderBy('a.id','DESC')
                    ->get();

        return view('layout.transaksi',['data' => $data, 'username' => $username]);
    }

    public function store() {

        $username = session()->get('username');

        $insert = TransaksiMaster::create([
                    'tanggal' => DB::raw('now()'),
                    'user_input' => $username
                ]);

        return redirect('/transaksi')->with('success','Data Added Successfully');
    }

    public function posting($id) {

        $transaksi = TransaksiMaster::find($id);

        $transaksi->status = 2;
        $transaksi->save();

        return redirect('/transaksi')->with('success','Data Posted Successfully');

    }

    public function delete($id) {

        $transaksi_detail = TransaksiDetail::find($id);

        $transaksi_detail->delete();

        $transaksi = TransaksiMaster::find($id);

        $transaksi->delete();

        return redirect('/transaksi')->with('success','Data Deleted Successfully');

    }

}
