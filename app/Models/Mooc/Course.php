<?php

namespace App\Models\Mooc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $connection = 'mysql3';
    protected $table = 'mooc_courses';

    protected $fillable = [
        'slug', 'titre', 'date', 'niveau', 'duree', 'visits', 'chapitres', 'excerpt', 'contenu', 'auteur', 'banniere', 'color'
    ];
}
