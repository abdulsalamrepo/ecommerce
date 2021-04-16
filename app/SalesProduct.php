<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sale_id','product_id','price','quantity'];

    public function product()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }
    public function sale()
    {
        return $this->belongsTo('App\sale','sale_id','id');
    }
}
