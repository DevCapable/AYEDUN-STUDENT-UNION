<?php

namespace App\Modules\Vote\Models;

use App\Models\MissAyedunApplication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $table = 'vote';

    protected $fillable = [
        'amount',
        'voter_first_name',
        'voter_last_name',
        'voter_email',
        'voter_count',
        'email',
        'phone',
        'unit_left',
        'candidate_id'
    ];


    public function contestant()
    {
        return $this->belongsTo(MissAyedunApplication::class, 'voter_count');
    }
}
