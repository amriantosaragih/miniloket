<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $table = 'ticket_type';
    public $incrementing = false;
    protected $fillable = ['id', 'type', 'price', 'quota'];
}
