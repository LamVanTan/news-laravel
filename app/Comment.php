<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table="binhluan";
    

    public function TinTuc(){
    	return $this->belongsTo('App\TinTuc','idTinTuc','id');
    }

    public function UserAdmin(){
    	return $this->belongsTo('App\UserAdmin','idUser','id');
    }
}
