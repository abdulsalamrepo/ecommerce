<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Swish extends Model
{
    protected $fillable =['order_id','swish_number','properties'];
}
