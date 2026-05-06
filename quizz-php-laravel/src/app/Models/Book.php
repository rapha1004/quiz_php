<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Table('books')]
class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
