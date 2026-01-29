<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $primaryKey = 'news_id';
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'upload_date'
        'status',
        'author_id'
    ];

    public function category()
{
        return $this->beelongsTo(category::class,'category_id');
}
}