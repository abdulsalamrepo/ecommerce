<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryAll extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','parent_category_id','sort','is_active'];

    /**
     * categories
     *
     * @return void
     */
    public function categories()
    {
    	return $this->hasMany('App\CategoryAll', 'parent_category_id', 'id');
    }

    /**
     * hasChildren
     *
     * @return void
     */
    public function hasChildren()
    {
    	return is_null($this->hasMany('App\CategoryAll', 'parent_category_id', 'id'))?false:true;
    }

    /**
     * parentCategory
     *
     * @return void
     */
    public function parentCategory()
    {
    	return $this->belongsTo('App\CategoryAll','parent_category_id','id');
    }

    /**
     * products
     *
     * @return void
     */
    public function products()
    {
    	return $this->hasMany('App\Product', 'id', 'category_id');
    }

}
