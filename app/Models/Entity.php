<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $table = 'entities';
    public $timestamps = true;

    protected $fillable = [
        'qs_entity', 'name', 'description', 'siren', 'siret', 'naf', 'address', 'address_details', 'zip', 'city', 'state', 'country', 'longitude', 'latitude', 'phone', 'email', 'contact', 'provider', 'client'
    ];
}
