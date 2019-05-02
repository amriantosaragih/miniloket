<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'ticket_type_id', 'location_id'];
}
