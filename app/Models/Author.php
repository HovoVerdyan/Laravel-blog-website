<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;

class Author extends Model
{
    use HasFactory;

    public function profile()
    {
        $profile = $this->hasOne('App\Models\Profile');

        return $profile;
    }
}
