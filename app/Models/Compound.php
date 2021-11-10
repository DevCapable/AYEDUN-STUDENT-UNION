<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compound extends Model
{
    use HasFactory;

    protected $fillable=[
        'Name_of_Compound',
        'head_of_compound',
        'history_of_compound',
        'origin',
        'culture_of_compound',
        'phone',
    ];
    public $sortable = ['id', 'Name_of_Compound', 'origin', 'head_of_compound', 'history_of_compound', 'culture_of_compound','phone', 'created_at', 'updated_at'];
    protected $hidden=['
    phone'];
}
