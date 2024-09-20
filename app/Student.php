<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['stdName','schoolName','department', 'shift', 'fee'];
}
