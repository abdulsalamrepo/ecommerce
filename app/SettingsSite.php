<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingsSite extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key','view','data'];
}
