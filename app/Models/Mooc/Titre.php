<?php

namespace App\Models\Mooc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titre extends Model
{
    use HasFactory;

    protected $connection = 'mysql3';
    protected $table = 'mooc_titres';

    protected $fillable = [
        'name', 'nb_years', 'rncp', 'fc'
    ];
}
