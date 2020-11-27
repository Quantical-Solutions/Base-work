<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $table = 'calendars';
    public $timestamps = true;

    protected $fillable = [
        'title', 'occurrences', 'notifications', 'calendar_type', 'start_date', 'end_date', 'all_day', 'start_time', 'end_time', 'description', 'guests', 'location', 'longitude', 'latitude', 'visio_url', 'color'
    ];
}
