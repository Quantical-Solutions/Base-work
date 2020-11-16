<?php

namespace App\Models\Games\QuestOfSallida;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'legals';

    protected $fillable = [
        'licence', 'credits', 'legal', 'terms', 'privacy'
    ];
}
