<?php

namespace App;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Encryption\DecryptException;

class account extends Model
{
    private $customKey = "861EC41CEE4D3C9F9F7255444F393CA0"; //AES-128-cbc (Custom Generated Key)
    protected $fillable = [
        'domain_name', 'domain_link', 'domain_picture', 'password', 'email_id', 'catagory_id', 'user_name', 'notes', 'user_id',
    ];

    public function email(){
        return $this->belongsTo('App\Email');
    }

    public function catagory(){
        return $this->belongsTo('App\Catagory');
    }

    

    public function setPasswordAttribute($val){
        try {
            $key = $this->customKey; 
            $newEncrypter = new \Illuminate\Encryption\Encrypter( $key, Config::get( 'app.cipher' ) );
            $this->attributes['password'] = $newEncrypter->encrypt($val);
        }catch(DecryptException $e) {
            //session(['error' => $e]);
        }
    }

    public function getPasswordAttribute($val){
        try {
            $key = $this->customKey; 
            $newEncrypter = new \Illuminate\Encryption\Encrypter( $key, Config::get( 'app.cipher' ) );
            return $this->attributes['password'] = $newEncrypter->decrypt($val);
            }catch(DecryptException $e) {
                //session(['error' => $e]);
            }
        }

    public function setDomain_NameAttribute($val){
    
        $this->attributes['domain_name'] = ucfirst(strtolower($val));
    }
}
