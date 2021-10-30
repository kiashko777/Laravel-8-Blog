<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use HasFactory;

  protected $guarded = [];

//RELATIONSHIP BETWEEN POST AND COMMENT

  public function post()
  {
    return $this->belongsTo(Post::class);
  }


//RELATIONSHIP BETWEEN AUTHOR AND COMMENT

  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
