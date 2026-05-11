<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Quizz extends Model
{
    use HasFactory;

    protected $fillable = array('title', 'logo_url');

    protected function getUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
