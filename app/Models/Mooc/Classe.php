<?php

namespace App\Models\Mooc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $connection = 'mysql3';
    protected $table = 'mooc_classes';

    protected $fillable = [
        'name', 'school_id', 'titre_id', 'start_year', 'end_year', 'graduate'
    ];
}
