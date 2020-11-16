<?php

namespace App\Models\Mooc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExercice extends Model
{
    use HasFactory;

    protected $connection = 'mysql3';
    protected $table = 'mooc_user_exo';

    protected $fillable = [
        'user_id', 'exo_id', 'done', 'date'
    ];
}
