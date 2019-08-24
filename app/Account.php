<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    protected $fillable = [
        'domain_name', 'domain_link', 'domain_picture', 'password', 'email_id', 'catagory_id',
    ];

    public function email(){
        return $this->belongsTo('App\Email');
    }

    public function catagory(){
        return $this->belongsTo('App\Catagory');
    }
}
