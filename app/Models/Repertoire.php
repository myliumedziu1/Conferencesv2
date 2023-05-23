<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repertoire extends Model
{
    protected $fillable = [
        'event_name',
        'brief_description',
        'full_description',
        'bookauthor',
        'additional1',
        'additional2',
        'image_path',
        'slug',
    ];

    // Define the image upload path
    protected $uploadsPath = 'images/repertoires';

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_repertoire');
    }

    // Accessor for image path
    public function getImagePathAttribute()
    {
        return $this->attributes['image_path'] ? asset('storage/' . $this->attributes['image_path']) : null;
    }

    // Mutator for image upload
    public function setImage($file)
    {
        if ($file) {
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs($this->uploadsPath, $filename, 'public');
            $this->attributes['image_path'] = $this->uploadsPath . '/' . $filename;
        }
    }
}
