<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = ['qrcode', 'status', 'user_id', 'code_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function code(){
        return $this->belongsTo('App\Code');
    }
}
