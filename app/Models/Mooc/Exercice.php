<?php

namespace App\Models\Mooc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    use HasFactory;

    protected $connection = 'mysql3';
    protected $table = 'mooc_exercices';

    protected $fillable = [
        'course_id', 'contenu', 'date'
    ];
}
