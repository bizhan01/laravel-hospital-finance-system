<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $fillable = ['fullName', 'position', 'salary', 'dob', 'phone',  'email',
  'province1', 'district1', 'region1', 'province2', 'district2',
   'region2', 'profileImage','tazkira', 'warranty' ];
}
