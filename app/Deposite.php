<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposite extends Model
{
    protected $fillable=[
        'name_id','description','total_taka','month','deposit_date',
    ];
}
