<?php

namespace App\Models\Games\QuestOfSallida;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'characters';

    protected $fillable = [
       'avatar', 'name', 'locked', 'height', 'weight', 'health', 'speed', 'attack', 'defense'
    ];
}
