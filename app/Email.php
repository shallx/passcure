<?php

namespace App;


use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Encryption\DecryptException;

class Email extends Model
{
    protected $fillable = [
        'email', 'password', 'ref_number', 'ref_email', 'description', 'provider', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function mailbox(){
        return $this->belongsTo('App\Mailbox');
    }

    public function accounts(){
        return $this->hasMany('App\Account');
    }

    public function setEmailAttribute($val){
        try {
            $value = strtolower($val);
            $customKey = "861EC41CEE4D3C9F9F7255444F393CA0"; 
            $newEncrypter = new \Illuminate\Encryption\Encrypter( $customKey, Config::get( 'app.cipher' ) );
            $this->attributes['email'] = $newEncrypter->encrypt($value);
        }catch(DecryptException $e) {
            //session(['error' => $e]);
        }
    }

    public function setPasswordAttribute($val){
        try {
            $customKey = "861EC41CEE4D3C9F9F7255444F393CA0"; 
            $newEncrypter = new \Illuminate\Encryption\Encrypter( $customKey, Config::get( 'app.cipher' ) );
            $this->attributes['password'] = $newEncrypter->encrypt($val);
        }catch(DecryptException $e) {
            //session(['error' => $e]);
        }
    }

    public function getEmailAttribute($val){
        try {
        $customKey = "861EC41CEE4D3C9F9F7255444F393CA0"; 
        $newEncrypter = new \Illuminate\Encryption\Encrypter( $customKey, Config::get( 'app.cipher' ) );
        return $this->attributes['email'] = $newEncrypter->decrypt($val);
        }catch(DecryptException $e) {
            //session(['error' => $e]);
        }
    }

    public function getPasswordAttribute($val){
        try {
        $customKey = "861EC41CEE4D3C9F9F7255444F393CA0"; 
        $newEncrypter = new \Illuminate\Encryption\Encrypter( $customKey, Config::get( 'app.cipher' ) );
        return $this->attributes['password'] = $newEncrypter->decrypt($val);
        }catch(DecryptException $e) {
            //session(['error' => $e]);
        }
    }

    public function setProviderAttribute($val){
        
        $this->attributes['provider'] = ucfirst(strtolower($val));
    }
}
