<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $primaryKey = 'category_id';
    protected $fillabel = ['category_name'];

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }
}
