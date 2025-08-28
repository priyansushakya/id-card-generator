<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IDCard extends Model
{
    protected $table = 'id_cards'; // matches your DB table

    protected $fillable = [
    'name',
    'email',
    'date_of_birth',
    'address',
    'phone',
    'issue_date',
    'expiry_date',
    'photo'
    ];
}
