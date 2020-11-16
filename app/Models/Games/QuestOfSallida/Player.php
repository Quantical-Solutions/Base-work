<?php

namespace App\Models\Games\QuestOfSallida;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'players';

    protected $fillable = [
        'pseudo', 'avatar', 'pass', 'email', 'date'
    ];
}
