<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tb_transaksi';
    protected $primaryKey = 'id_transaksi';

    public function kategori()
    {
    	return $this->belongsTo('App\Models\Transaksi', 'id_kategori', 'id_kategori');
    }

}
