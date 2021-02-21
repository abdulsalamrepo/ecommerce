<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurService extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','icon','is_active'];
}
