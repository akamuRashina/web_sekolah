<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profileschool extends Model
{
    protected $table = 'profile_schools';

    protected $fillable = [
        'school_name',
        'description',
        'address',
        'principal_name',
        'principal_photo',
        'number_of_students',
        'vision',
        'mission',
        'history',
    ];
}
