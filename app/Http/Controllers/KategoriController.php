<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Kategori;

class KategoriController extends Controller
{
	public function getKategori() {
		$data = Kategori::all();
	    return view('kategori/list_kategori',['kategori'=>$data]);
	}

	public function addKategori() {
		return view('kategori/form_add');
	}

	public function storeKategori(Request $request) {
		$this->validate($request, [
			'nama_kategori' => 'required',
			'jenis' => 'required'
		]);

		$dt = new Kategori();
    	$dt->nama_kategori = $request->nama_kategori;
    	$dt->tipe_kategori = $request->jenis;
    	$dt->deskripsi = $request->deskripsi;
    	$dt->save();

    	return redirect('list_kategori');
	}

	public function showEditKategori($id_kategori) {
		$dt_kategori = Kategori::findOrFail($id_kategori);
		return view('kategori/form_edit',['dt'=>$dt_kategori]);
	}

	public function storeEdit(Request $request, $id_kategori) {
		$dt_new = Kategori::findOrFail($id_kategori);

    	$dt_new->nama_kategori = $request->nama_kategori;
    	$dt_new->tipe_kategori = $request->jenis;
    	$dt_new->deskripsi = $request->deskripsi;
    	$dt_new->save();

    	return redirect('list_kategori');
	}

	public function deleteKategori($id_kategori) {
		Kategori::destroy($id_kategori);
		return redirect('list_kategori');
	}

}
