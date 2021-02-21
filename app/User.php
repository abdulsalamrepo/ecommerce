<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'prev_password',
        'day',
        'month',
        'year',
        'gender',
    ];

    public function addresses()
    {
    	return $this->hasMany('App\Address', 'id', 'address_id');
    }
}
