<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'excerpt',
        'author_id',
        'published_at',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
