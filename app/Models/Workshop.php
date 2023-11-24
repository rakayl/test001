<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $table = 'workshops';

    protected $primaryKey = 'id';
    
    protected $fillable   = [
       'nama_workshop',
    ];
}
