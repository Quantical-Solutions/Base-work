<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat_visit extends Model
{
    use HasFactory;

    protected $table = 'stats_visits';
    public $timestamps = true;

    protected $fillable = [
        'visitor_id', 'page_title', 'page_link', 'page_duration', 'ip_address', 'hits'
    ];
}
