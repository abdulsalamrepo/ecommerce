<?php

namespace App;

use App\Product;
use DateTimeInterface;
use App\ProductCategories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategories extends Model
{

    use SoftDeletes;

    public $table = 'product_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');

    }

    public function parentCategory()
    {
        return $this->belongsTo(ProductCategories::class, 'category_id','id');
    }

    public function childCategories()
    {
        return $this->hasMany(ProductCategories::class, 'category_id','id');

    }

    public function products()
    {
    	return $this->hasMany('App\Product', 'category_id', 'id');
    }
    
    public function images()
    {
    	return $this->hasMany('App\CategoryImage', 'category_id', 'id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
