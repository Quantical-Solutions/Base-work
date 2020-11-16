<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $table = 'newsletters';
    public $timestamps = true;

    protected $fillable = [
        'title_fr', 'title_en', 'content_fr', 'content_en', 'entity_id'
    ];
}
