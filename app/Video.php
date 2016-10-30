<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
  // protected $fillable = [
  //     'name', 
  //     'description', 
  //     'video_type_id', 
  //     'source', 
  //     'payload'
  // ];

  // public function getNameAttribute() 
  // {
  //     return $this->attributes['name'];
  // }

  // public function setNameAttribute($value) 
  // {
  //     $this->attributes['name'] = $value;
  // }

  // public function getDescriptionAttribute() 
  // {
  //     return $this->attributes['description'];
  // }

  // public function setDescriptionAttribute($value) 
  // {
  //     $this->attributes['description'] = $value;
  // }

  public function videoType()
  {
      return $this->belongsTo('App\VideoType');
  }

  // public function getSourceAttribute() 
  // {
  //     return $this->attributes['source'];
  // }

  // public function setSourceAttribute($value) 
  // {
  //     $this->attributes['source'] = $value;
  // }

  // public function getPayloadAttribute() 
  // {
  //     return $this->attributes['payload'];
  // }

  // public function setPayloadAttribute($value) 
  // {
  //     $this->attributes['payload'] = $value;
  // }
}