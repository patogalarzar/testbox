<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
  //
  use softDeletes;

  protected $table = 'emails';

  protected $fillable = [
    'date',
    'from',
    'to',
    'cc',
    'subject',
    'attachment',
    'message'
  ];

  protected $hidden = ['created_at','cupdated_at'];
  protected $dates = ['deleted_at'];
}
