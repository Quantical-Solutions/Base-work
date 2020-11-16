<?php

namespace App\Models\Mooc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $connection = 'mysql3';
    protected $table = 'mooc_users';

    protected $fillable = [
        'admin', 'first_name', 'last_name', 'email', 'pass', 'avatar', 'apropos', 'centres', 'first_conn', 'date'
    ];
}
