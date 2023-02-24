<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'file',
        'user_id',
        'group_id',
        'user_name',
        'user_profile',
        'user_branch',
        'user_year',
        'user_role'
    ];
}
