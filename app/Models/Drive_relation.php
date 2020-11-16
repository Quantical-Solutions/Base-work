<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drive_relation extends Model
{
    use HasFactory;

    protected $table = 'drive_relations';
    public $timestamps = true;

    protected $fillable = [
        'path_id', 'user_id'
    ];
}
