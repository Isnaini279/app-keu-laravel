<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Transaksi;
use App\Models\Kategori;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function getTransaksi() {
    	$total_saldo = Transaksi::query()
    		->select(DB::raw('IFNULL(FLOOR(SUM(nominal)), 0) as total_saldo'))
		    ->whereMonth('created_at' ,'=' , Carbon::now())
		    ->first();

    	$data_trx = Transaksi::query()
    		->select(DB::raw('t.id_transaksi, t.jenis_transaksi, k.nama_kategori, t.nominal, t.deskripsi'))
    		->from('tb_transaksi as t')
    		->leftJoin('tb_kategori as k', 't.id_kategori', '=', 'k.id_kategori')
    		->whereMonth('t.created_at' ,'=' , Carbon::now())
    		->get();

	    return view('transaksi/list_transaksi',['trx'=>$data_trx, 'saldo'=> $total_saldo]);
    }

    public function addTransaksi() {

    	$kategori = Kategori::all();
		return view('transaksi/form_add',['dt_kategori'=>$kategori]);
	}

	public function storeTransaksi(Request $request) {
		$this->validate($request, [
			'jenis' => 'required',
			'kategori' => 'required',
			'nominal' => 'required|integer'
		]);

		$trx = new Transaksi();
    	$trx->jenis_transaksi = $request->jenis;
    	$trx->id_kategori = $request->kategori;
    	$trx->nominal = $request->nominal;
    	$trx->deskripsi = $request->deskripsi;
    	$trx->save();

    	return redirect('list_transaksi');
	}

	public function showEditTransaksi($id_transaksi) {
		$dt_kategori = Kategori::all();
		$dt_trx = Transaksi::findOrFail($id_transaksi);
		$nmk = Transaksi::query()
    		->select(DB::raw('t.id_transaksi, t.id_kategori, k.nama_kategori'))
    		->from('tb_transaksi as t')
    		->leftJoin('tb_kategori as k', 't.id_kategori', '=', 'k.id_kategori')
    		->where('t.id_transaksi',$id_transaksi)
    		->first();

    	// dd($dt_kategori);

		return view('transaksi/form_edit',['kategori'=>$dt_kategori, 'trx'=> $dt_trx, 'nama_k'=>$nmk]);
	}

	public function storeEditTransaksi(Request $request, $id_transaksi) {
		$dt_new = Transaksi::findOrFail($id_transaksi);

    	$dt_new->jenis_transaksi = $request->jenis;
    	$dt_new->id_kategori = $request->kategori;
    	$dt_new->nominal = $request->nominal;
    	$dt_new->deskripsi = $request->deskripsi;
    	$dt_new->save();

    	return redirect('list_transaksi');
	}

	public function deleteTransaksi($id_transaksi) {
		Transaksi::destroy($id_transaksi);
		return redirect('list_transaksi');
	}

	public function filterTransaksi(Request $request) {
		$start_date = Carbon::parse($request->start)->format('Y-m-d');
		$end_date = Carbon::parse($request->end)->format('Y-m-d');

		$total_saldo = Transaksi::query()
    		->select(DB::raw('IFNULL(FLOOR(SUM(nominal)), 0) as total_saldo'))
		    ->whereMonth('created_at' ,'=' , Carbon::now())
		    ->first();

    	$data_trx = Transaksi::query()
    		->select(DB::raw('t.id_transaksi, t.jenis_transaksi, k.nama_kategori, t.nominal, t.deskripsi'))
    		->from('tb_transaksi as t')
    		->leftJoin('tb_kategori as k', 't.id_kategori', '=', 'k.id_kategori')
    		->whereBetween('t.created_at', array($start_date, $end_date))
    		->get();

    	// dd($data_trx);

	    return view('transaksi/list_transaksi',['trx'=>$data_trx, 'saldo'=> $total_saldo]);
	}

}
