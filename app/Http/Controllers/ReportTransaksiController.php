<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiMaster;
use App\Models\TransaksiDetail;
use PDF;
use Session;

class ReportTransaksiController extends Controller
{
    public function index() {

        $username = session()->get('username');

        if ($username == "") {
            return redirect('/logout');
        }

        return view('layout.report_transaksi',['username' => $username]);
    }

    public function view(Request $request) {

        $username = session()->get('username');

        if ($username == "") {
            return redirect('/logout');
        }

        $data = DB::table('transaksi_master as a')
                    ->select('a.*',DB::raw('COUNT(b.id_barang) as jumlah,REPLACE(FORMAT(SUM(b.harga*b.qty),0),",",".") as total,IF(a.status = 1,"INPUT","POSTED") as stat'))
                    ->leftJoin('transaksi_detail as b','b.id','a.id')
                    ->whereRaw('DATE_FORMAT(a.tanggal,"%Y-%m-%d") BETWEEN ? AND ?',[$request->tanggal_awal,$request->tanggal_akhir])
                    ->groupBy('a.id')
                    ->orderBy('a.tanggal','ASC')
                    ->get();

        $pdf = PDF::loadview('layout.report_transaksi_view',['tanggal_awal' => $request->tanggal_awal, 'tanggal_akhir' => $request->tanggal_akhir, 'data'=>$data]);
        return $pdf->stream();
    }
}
