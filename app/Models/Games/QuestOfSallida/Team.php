<?php

namespace App\Models\Games\QuestOfSallida;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'teams';
    public $timestamps = true;

    protected $fillable = [
        'name', 'admin_id', 'avatar', 'date'
    ];
}
