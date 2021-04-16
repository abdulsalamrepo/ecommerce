<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesProductTemp extends Model
{

    protected $fillable = ['user_id','product_id','price','quantity'];

    public function product()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
