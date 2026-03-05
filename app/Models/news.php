<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'news_id';

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'publish_date',
        'status',
        'author_id'
    ];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}