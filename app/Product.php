<?php

namespace App;

use DateTimeInterface;
use App\ProductCategories;
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
        'weight'
    ];

    public function category()
    {
    	return $this->belongsTo(ProductCategories::class,'category_id','id');
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategories::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
