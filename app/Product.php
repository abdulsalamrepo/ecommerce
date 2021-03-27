<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image_name',
        'description',
        'colors',
        'manufacturer',
        'price',
        'size',
        'material',
        'discount',
        'tag',
        'category_id',
        'delivered_at',
        'weight'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category','category_id','id');
    }


}
