<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Repertoire;
use Illuminate\Support\Facades\Storage;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'description',
        'text_field',
        'actor_type',
        'photo_src'
    ];

    public function repertoires()
    {
        return $this->belongsToMany(Repertoire::class);
    }

    public function setPhoto($photo)
    {
        if ($photo) {
            $photoPath = $photo->store('actors');
            $this->photo_src = $photoPath;
        }
    }
}
