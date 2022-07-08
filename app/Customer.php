<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable =['nama','phone','email', 'alamat','durasi','harga','id_paket','id_tujuan'];

    public function paket()
    {
        return $this->belongsTo(Paket::class,'id_paket');
    }
    public function tujuan(){
        return $this->belongsTo(Tujuan::class,'id_tujuan');
    }
}
