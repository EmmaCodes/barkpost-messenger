<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
  protected $fillable = ['name', 'description'];

  public function getPhoneNumberAttribute() {
      return $this->attributes['phone_number'];
  }

  public function setPhoneNumberAttribute($value) {
      $this->attributes['phone_number'] = $value;
  }

  public function scopeActive($query)
  {
      return $query->where('subscribed', 1);
  }
}