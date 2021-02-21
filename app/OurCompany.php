<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurCompany extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','href','is_active'];
}
