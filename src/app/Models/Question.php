<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = array('title', 'position', 'quizz_id');

    public function getQuizz()
    {
        return $this->belongsTo(Quizz::class);
    }
}
