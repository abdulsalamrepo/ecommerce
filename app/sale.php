<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
    [
        'user_id',
        'product_id',
        'address_id',
        'order_status',
        'price',
        'quantity'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }

    public function address()
    {
        return $this->belongsTo('App\Address','address_id','id');
    }
}
