<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'grade',
        'photo_profile',
        'name',
        'nis',
        'rombel',
        'password',
        'cv',
        'kartu_pelajar',
        'ig',
        'linkedin'
    ];

    protected $hidden = [
        'password'
    ];
}
