<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
      protected $fillable = [
        'user_id',
        'patientName',
        'OPD',
        'docName',
        'fee',
        'perscription',
        'retail',
        'emergency',
        'lab',
        'xray',
        'US',
        'dental',
        'physicalTherapy',
        'echo',
        'doblar',
        'pft',
        'endoscopy',
        'ambulance',
        'bed',
        'other',
        'total'
       ];
}
