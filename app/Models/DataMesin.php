<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataMesin extends Model
{
    protected $table = 'data_mesins';

    protected $primaryKey = 'id';
    
    protected $fillable   = [
       'nama_mesin',
            'tahun_mesin',
            'nama_kategori',
            'nama_klasifikasi',
            'klas_mesin',
            'kode_jenis',
            'type_mesin',
            'merk_mesin',
            'spek_min',
            'spek_max',
            'lok_ws',
            'kapasitas',
            'pabrik',
            'gambar_mesin'
    ];

    public function kategori()
    {
        return $this->belongsTo(\App\Models\KategoriMesin::class, 'nama_kategori');
    }
    public function klasifikasi()
    {
        return $this->belongsTo(\App\Models\KlasMesin::class, 'klas_mesin');
    }

}
