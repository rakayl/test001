<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';

    protected $primaryKey = 'id';
    
    protected $fillable   = [
       'user_id',
       'data_mesin_id',
       'note',
    ];
     public function data_mesin()
    {
        return $this->belongsTo(\App\Models\DataMesin::class, 'data_mesin_id');
    }
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
