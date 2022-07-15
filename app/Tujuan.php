<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    protected $table="tujuans";
    protected $fillable=['id','tujuan1','tujuan2','tujuan3','tujuan4','tujuan5'];

    public function customer(){
        return $this->hasOne('app\Customer');
    }
    public function paket(){
        return $this->hasOne('app\Paket');
    }
}
