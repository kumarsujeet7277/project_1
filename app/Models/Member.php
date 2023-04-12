<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable =[
        'assignee_code',
        'name',
        'mobile',
        'email',
        'password',
        'image',
        'role',
        'check',
    ];


    protected $hidden = [
        'password',
        'password_confirmation',
    ];
}
