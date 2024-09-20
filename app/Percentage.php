<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Percentage extends Model
{
      protected $fillable = ['user_id', 'docName','procedure','income', 'percentage',  'total'];
}
