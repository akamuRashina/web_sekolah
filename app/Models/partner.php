<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class partner extends Model
{
    protected $table = 'partner';

    protected $fillable = [
        'name',
        'field',
        'address',
        'phone',
        'email',
        'description',
        'status'
    ];
}
