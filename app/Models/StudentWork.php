<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_of_work',
        'description',
        'file_of_work',
        'id_major'
    ];

    public function major()
    {
        return $this->belongsTo(Major::class, 'id_major');
    }
}
