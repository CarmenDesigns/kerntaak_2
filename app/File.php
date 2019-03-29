<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['subject', 'year', 'level'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function upload(){
        return $this->hasOne(Upload::class);
    }



}
