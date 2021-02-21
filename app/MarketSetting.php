<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketSetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
'name',
'tel',
'email',
'address',
'language',
'currency',
'facebook',
'logo',
'twitter',
'whatsapp',
'google',
'instagram',
'youtube'
];
}
