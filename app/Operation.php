<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
      protected $fillable = ['user_id','patientName','docName', 'operationType','fee','docPercentage', 'assistantPercentage', 'anesthesiaPercentage', 'midwifePercentage', 'total'];
}
