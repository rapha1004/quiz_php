<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = array('text', 'is_correct', 'question_id');

    public function getQuestion()
    {
        return $this->belongsTo(Question::class);
    }
}
