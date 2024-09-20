<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvancePaid extends Model
{
      protected $fillable = ['fullName','date','amount', 'description',];
}
