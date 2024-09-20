<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
      protected $fillable = ['type','item','model', 'quantity', 'description'];
}
