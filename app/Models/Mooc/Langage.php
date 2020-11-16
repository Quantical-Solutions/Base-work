<?php

namespace App\Models\Mooc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langage extends Model
{
    use HasFactory;

    protected $connection = 'mysql3';
    protected $table = 'mooc_langages';

    protected $fillable = [
        'langage', 'logo'
    ];
}
