<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';
    public $timestamps = true;

    protected $fillable = [
        'backups_limit', 'multi_lang', 'limit_drive', 'full_drive', 'drive_faqs', 'drive_privacy'
    ];
}
