<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learning extends Model
{
    use HasFactory;

    protected $table = 'learnings';
    public $timestamps = true;

    protected $fillable = [
        'img', 'uri_fr', 'uri_en', 'title_fr', 'title_en', 'content_fr', 'content_en', 'meta_img', 'meta_title_fr', 'meta_title_en', 'meta_keywords_fr', 'meta_keywords_en', 'meta_description_fr', 'meta_description_en'
    ];
}
