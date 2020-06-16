<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable=[
        'name','email','phone','guardian_phone','nid','address','education_qualification','photo',
    ];
}
