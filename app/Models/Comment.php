<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Comment extends Model
{
    use HasFactory;
    use Sortable;
    protected $fillable =[
        'postId',
        'userId',
        'comment',
        'username'
       ];

        /**
     * Eloquent associations or relationships
     */
    public function Post()
    {
        return $this->hasMany(comment::class);
    }
}
