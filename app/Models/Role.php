<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    public const ADMIN = 1;
    public const NORMAL = 2;

    use HasFactory;

    public function users() {
        return $this->hasMany(User::Class);
    }

    public function esAdmin(): bool
    {
        return ($this->id == Self::ADMIN);
    }
}
