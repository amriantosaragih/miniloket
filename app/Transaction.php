<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    public $incrementing = false;
    protected $fillable = ['id', 'customer_id', 'event_id', 'quantity', 'total_price'];
}
