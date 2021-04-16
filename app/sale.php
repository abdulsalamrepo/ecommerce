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
        'order_number',
        'notes',
        'shipping_phone',
        'shipping_zipcode',
        'shipping_state',
        'shipping_city',
        'shipping_address',
        'shipping_fullname',
        'is_paid',
        'payment_method',
        'address_id',
        'user_id',
        'order_status',
        'grand_total',
        'item_count'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function address()
    {
        return $this->belongsTo('App\Address','address_id','id');
    }

    public function products()
    {
    	return $this->hasMany('App\SalesProduct', 'sale_id', 'id');
    }

}
