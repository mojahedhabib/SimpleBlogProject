<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $table = 'posts';
   protected $fillable = [
        'id',
        'slug',
        'title',
        'body',
        'timestamps',
    ];


   public function category() {
       return $this->belongsTo('App\Category');
   }

   public function tags() {
       return $this->belongsToMany('App\Tag');
   }

   public function comments() {
       return $this->hasMany('App\Comment');
   }
}
