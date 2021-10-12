<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  protected $guarded = ['id'];
<<<<<<< HEAD

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
=======
>>>>>>> ab5473addeafa249bee2bf99409f6c10c654a9a8
}
