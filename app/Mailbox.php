<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mailbox extends Model
{
    protected $fillable = [
        'provider', 'link',
    ];

    public function catagory(){
        return $this->hasMany('App\Email');
    }
}
