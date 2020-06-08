<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'tb_kategori';
    protected $primaryKey = 'id_kategori';

    public function transaksi()
    {
    	return $this->hasMany('App\Models\Transaksi', 'id_kategori', 'id_kategori');
    }
}
