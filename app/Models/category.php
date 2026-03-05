<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model // Gunakan huruf kapital 'C'
{
    use HasFactory;

    // protected $primaryKey = 'category_id';
    
    // Perbaikan: fillabel -> fillable
    protected $fillable = ['category_name'];

    public function news()
    {
        return $this->hasMany(News::class, 'categories_id');
    }
}