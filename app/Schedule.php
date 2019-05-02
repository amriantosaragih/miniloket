<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    public $incrementing = false;
    protected $fillable = ['id', 'time_start', 'time_end', 'start_date', 'end_date', 'address'];
}
