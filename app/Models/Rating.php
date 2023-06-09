<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  use HasFactory;

  protected $guarded = false;

  public function user()
  {
    return User::find($this->user_id);
    // return $this->belongsTo(User::class);
  }
}
