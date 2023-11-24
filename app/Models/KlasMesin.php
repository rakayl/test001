<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KlasMesin extends Model
{
    protected $table = 'klasmesins';

    protected $primaryKey = 'id';
    
    protected $fillable   = [
       'kategorimesin_id',
       'kode_klasifikasi',
       'nama_klasifikasi',
    ];
}
