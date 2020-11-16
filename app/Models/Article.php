<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    public $timestamps = true;

    protected $fillable = [
        'category_id', 'published', 'uri_fr', 'uri_en', 'title_fr', 'title_en', 'content_fr', 'content_en', 'img_1', 'img_2', 'img_3', 'meta_img', 'meta_title_fr', 'meta_title_en', 'meta_keywords_fr', 'meta_keywords_en', 'meta_description_fr', 'meta_description_en'
    ];
}
