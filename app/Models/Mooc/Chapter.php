<?php

namespace App\Models\Mooc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $connection = 'mysql3';
    protected $table = 'mooc_user_chapitre';

    protected $fillable = [
        'id_user', 'id_course', 'validate', 'chapitre', 'date'
    ];
}
