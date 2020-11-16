<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    public $timestamps = true;

    protected $fillable = [
        'event_date', 'event_start', 'event_end', 'title_fr', 'title_en', 'content_fr', 'content_en', 'address', 'address_details', 'zip', 'city', 'img', 'meta_img', 'meta_title_fr', 'meta_title_en', 'meta_keywords_fr', 'meta_keywords_en', 'meta_description_fr', 'meta_description_en'
    ];
}
