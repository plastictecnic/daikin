<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $fillable = ['sn', 'description'];

    public function parts (){
        return $this->hasMany('App\Part');
    }
}
