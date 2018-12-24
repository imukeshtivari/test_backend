<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {

  use SoftDeletes;

  protected $fillable = ['user_id', 'total'];

  public function items() {
    return $this->hasMany(OrderItem::class)->withTrashed();
  }

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function getTotalAttribute($value) {
    return number_format($value, 2);
  }

}
