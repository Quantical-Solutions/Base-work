<?php

namespace App\Models\Games\QuestOfSallida;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'stats';
    public $timestamps = true;

    protected $fillable = [
        'team_id', 'player_id', 'speed_runs', 'death_counts', 'life_points', 'playing_time', 'experience', 'date'
    ];
}
