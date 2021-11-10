<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class MissAsu extends Model
{
    use HasFactory;
    use Sortable;
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
   public $sortable = ['id', 'full_name', 'discepline','compound','institution', 'created_at', 'updated_at'];
    protected $hidden = [
        'phone'
    ];
}
