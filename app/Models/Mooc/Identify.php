<?php

namespace App\Models\Mooc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identify extends Model
{
    use HasFactory;

    protected $connection = 'mysql3';
    protected $table = 'mooc_identify';

    protected $fillable = [
        'code', 'date'
    ];
}
