<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model

{
    use HasFactory;

    protected $fillable = [
        'repertoire_id',
        'event_name',
        'brief_description',
        'full_description',
        'image_src',
        'slug',
        'event_date',
        'event_type',
        'location',
        'ticket_url'
    ];


    public function repertoire()
    {
        return $this->belongsTo(Repertoire::class);
    }
}
