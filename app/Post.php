<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    //protected $table = 'mypost';
    protected $fillable=['title','content','slug','active'];

    public function comment(){
        return $this->hasMany('App\Comment');
    }

    
    public static function boot(){
        parent::boot();

        static::deleting(function(Post $post){
            $post->comment()->delete();
        });

        static::restoring(function (Post $post) {
            $post->comment()->restore();
        });
    }



}
