<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table ="pakets";
    protected $primaryKey="id";
    protected $fillable=['id','paket','id_tujuan','car','hotel','bonus'];

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
    public function tujuan(){
        return $this->belongsTo(Tujuan::class,'id_tujuan');
    }
}
