<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriMesin extends Model
{
    protected $table = 'kategori_mesins';

    protected $primaryKey = 'id';
    
    protected $fillable   = [
       'nama_kategori',
       'kode_kategori',
    ];
}
