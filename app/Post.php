<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Post extends Model
{
    protected $fillable = [
      "title" ,
      "desc",
      "content",
      "author",
      "category_id"
    ];

    public function category() {

    return $this -> belongsTo(Category::class);
  }
}
