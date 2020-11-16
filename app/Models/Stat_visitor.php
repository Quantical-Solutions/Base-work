<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat_visitor extends Model
{
    use HasFactory;

    protected $table = 'stats_visitors';
    public $timestamps = true;

    protected $fillable = [
        'token', 'ip_address', 'device', 'city', 'country', 'country_code', 'flag', 'continent', 'longitude', 'latitude', 'browser', 'browser_version', 'browser_picto', 'os_client', 'os_version', 'os_picto', 'referrer_site', 'keywords', 'sentence', 'engine', 'engine_picto'
    ];
}
