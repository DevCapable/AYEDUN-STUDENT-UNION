<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Message extends Model

{
    use HasFactory;
    use Sortable;
    protected $fillable =[
        'userId',
        'from_who',
        'to_who',
        'message',
        'status'
    ];
    public $sortable =['from_who','to_who','status'];
}
