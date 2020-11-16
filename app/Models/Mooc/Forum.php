<?php

namespace App\Models\Mooc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $connection = 'mysql3';
    protected $table = 'mooc_forums';

    protected $fillable = [
        'classe_id', 'content', 'date'
    ];
}
