<?php

namespace App\Models\Mooc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $connection = 'mysql3';
    protected $table = 'mooc_infos';

    protected $fillable = [
        'private_life', 'faqs'
    ];
}
