<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailModel extends Model
{
    use HasFactory;

    protected $table = 'emails_models';
    public $timestamps = true;

    protected $fillable = [
        'name', 'content_fr', 'content_en'
    ];
}
