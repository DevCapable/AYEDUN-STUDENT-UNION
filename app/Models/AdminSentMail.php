<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSentMail extends Model
{
    use HasFactory;
    protected $fillable = [
        'from_who',
        'type_of_issue',
        'details',
        'email',
        'status'
    ];
    protected $hidden=['status'];
}
