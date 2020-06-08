<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Transaksi;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function getDataKeuangan() {
    	// $total_saldo = Transaksi::query()
    	// 	->select(DB::raw('IFNULL(FLOOR(SUM(nominal)), 0) as total_saldo'))
		   //  ->whereMonth('created_at' ,'=' , Carbon::now())
		   //  ->first();

		$total_pemasukan = Transaksi::query('tb_transaksi')
    		->select(DB::raw('IFNULL(FLOOR(SUM(nominal)), 0) as total_pemasukan'))
		    ->where('jenis_transaksi' ,'pemasukan')
		    ->first();

		$total_pengeluaran = Transaksi::query('tb_transaksi')
    		->select(DB::raw('IFNULL(FLOOR(SUM(nominal)), 0) as total_pengeluaran'))
		    ->where('jenis_transaksi' ,'pengeluaran')
		    ->first();

	    return view('home/home',['pemasukan' => $total_pemasukan, 'pengeluaran' => $total_pengeluaran]);
    }
}
