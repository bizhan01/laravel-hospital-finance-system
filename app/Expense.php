<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['user_id', 'item','category','consumer','billNumber','price','quantity', 'unit', 'total', 'description'];
}
