<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'account_type',
    ];
    public $timestamps = false;

    public function accounts(){
        return $this->hasMany('App\Account');
    }


}
