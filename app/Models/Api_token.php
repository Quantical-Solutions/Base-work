<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api_token extends Model
{
    use HasFactory;

    protected $table = 'api_tokens';
    public $timestamps = true;

    protected $fillable = [
        'entity_id', 'product_id', 'token', 'single_site_mode', 'site_domain'
    ];
}
