<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    public $incrementing = false;
    protected $fillable = ['id', 'province', 'city', 'street', 'zip_code', 'address'];
}
