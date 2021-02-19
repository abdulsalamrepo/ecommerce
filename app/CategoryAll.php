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

    public function categories()
    {
    	return $this->hasMany('App\CategoryAll', 'parent_category_id', 'id');
    }
    public function hasChildren()
    {
    	return is_null($this->hasMany('App\CategoryAll', 'parent_category_id', 'id'))?false:true;
    }
    public function parentCategory()
    {
    	return $this->belongsTo('App\CategoryAll','parent_category_id','id');
    }


}
