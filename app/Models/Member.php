<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

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

    public static function validationRule(){
       return [
        'assignee_code' => 'required | digits:2',
            'name' =>[
                'required',
                'regex:/^[\pL\s]+$/u',
                'max:50',
            ],
            // alpha:ascii (for user only)
            'mobile' => 'required | digits:10 | numeric',
            'email' => ' email|required ',
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            ],
            
            'image' => 'image | mimes:jpg,png',

            // 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

             
            'role' => [
                'required',
                Rule::in(['Clerk', 'Manager', 'Supervisor', 'Devloper', 'Other']),   
            ],
        ];
    }
}
