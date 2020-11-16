<?php

namespace App\Models\Games\QuestOfSallida;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'commandes';

    protected $fillable = [
        'pad', 'code', 'active', 'action'
    ];
}
