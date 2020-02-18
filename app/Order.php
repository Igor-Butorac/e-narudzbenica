<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $primaryKey = 'id';

    public function users(){

        return $this->belongsTo('App\User');
        //svaka narudzba pripada jednom useru
    }

    public function items(){

        return $this->hasMany('App\Item');

    }

}
