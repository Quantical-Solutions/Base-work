<?php

namespace App\Models\Mooc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $connection = 'mysql3';
    protected $table = 'mooc_ressources';

    protected $fillable = [
        'type', 'title', 'url', 'logo', 'address', 'zip', 'city', 'country', 'phone', 'email'
    ];
}
