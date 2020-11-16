<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drive_shared_path extends Model
{
    use HasFactory;

    protected $table = 'drive_shared_paths';
    public $timestamps = true;

    protected $fillable = [
        'path', 'salt', 'private'
    ];
}
