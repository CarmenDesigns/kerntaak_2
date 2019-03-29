<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    //The fillable property defines which attributes may be assignable.

    protected $fillable = ['subject', 'year', 'level'];


    //The relationships between file and user and file and upload are defined here.

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function upload(){
        return $this->hasOne(Upload::class);
    }



}
