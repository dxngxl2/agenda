<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;


class Contact extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withPivot('intensity');
    }
}
