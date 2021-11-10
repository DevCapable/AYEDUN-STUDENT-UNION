<?php

namespace App\Models;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class UserAccount extends Model
{
    use HasFactory;
   use Sortable;

    /**
     * These attributes are mass assignable
     */
    protected $fillable = [
        'fullname',
        'id_number',
        'guest',
        'username',
        'email',
        'date_of_birth',
        'compound',
        'institution',
        'place_of_residence',
        'marital_status',
        'security_question',
        'answers',
        'phone',
        'stakeholder',
        'category',
        'tenure_year_from',
        'tenure_year_to',
        'post_held',
        'address',
        'gender',
        'password',
        'picture',
        'is_online'
    ];
   public $sortable = ['id', 'fullname', 'compound','institution', 'created_at', 'updated_at'];
    protected $hidden = [
        'password', 'id_number',
    ];
}
