<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventList extends Model
{
    use HasFactory;

    public $fillable = [
        'header',
        'summary',
        'article',
        'date'

    ];
}
