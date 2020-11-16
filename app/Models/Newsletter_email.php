<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter_email extends Model
{
    use HasFactory;

    protected $table = 'newsletter_emails';
    public $timestamps = true;

    protected $fillable = [
        'email', 'entity_id'
    ];
}
