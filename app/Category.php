<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type'
    ];

    public function products()
    {
    	return $this->hasMany('App\Product', 'category_id', 'id');
    }
    public function images()
    {
    	return $this->hasMany('App\CategoryImage', 'category_id', 'id');
    }
}
