<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * These attributes are mass assignable
     */
    protected $fillable = [
        'userId',
        'username',
        'posting',
        'image',
        'ImageCaption',
        'video',
        'VideoCaption',
    ];

    protected $hidden = [
        'userId'
    ];

    /**
     * Eloquent associations or relationships
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}