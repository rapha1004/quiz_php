<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Table("quizzs")]
class Quizz extends Model
{
    use HasFactory;

    protected $fillable = array('title', 'logo_url');

    public function getUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
