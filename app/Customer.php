<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'gender', 'address'];
}
