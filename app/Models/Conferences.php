<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conferences extends Model
{
    use HasFactory;

    protected $fillable = [
        'name2',
        'surname',
        'email1',
        'phone',
    ];
}
