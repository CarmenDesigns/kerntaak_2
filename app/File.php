<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['subject', 'year', 'level'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function uploads(){
        return $this->hasOne(Upload::class);
    }
}
