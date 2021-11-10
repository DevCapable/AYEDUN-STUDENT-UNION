<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sports extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'compound',
        'gender',
        'discepline',
        'institution',
        'date_of_birth',
        'year_of_tenure_from',
        'year_of_tenure_to',
        'sport',
        'history',
        'phone',
        'picture',
    ];
   public $sortable = ['id', 'fullname', 'discepline','compound','institution'];
    protected $hidden = [
        'phone'
    ];
}


