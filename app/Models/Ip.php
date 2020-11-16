<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    use HasFactory;

    protected $table = 'ips';
    public $timestamps = true;

    protected $fillable = [
        'ip_address', 'attempts', 'country'
    ];
}
