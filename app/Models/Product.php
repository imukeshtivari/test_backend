<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {

  use SoftDeletes;

  protected $fillable = ['title', 'category_id', 'description', 'image', 'price'];

  public function category() {
    return $this->belognsTo(Category::class);
  }

  public function getCategoryAttribute($value) {
    if ($this->category_id) {
      return Category::find($this->category_id)->name;
    }
    return "";
  }

}
