<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPost extends Model
{
    use HasFactory;

    protected $fillable =[
        'adminName',
        'posting',
        'image',
        'imageCaption',
        'video',
        'VideoCaption',
    ];
    public function likes()
    {
        return $this->hasMany(adminLike::class);
    }
}
