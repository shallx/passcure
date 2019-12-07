<?php

namespace App\Http\Controllers;

use App\User;
use App\Email;
use App\Account;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $validate = $request->validate([
            'search' => 'required',
         ]);
        
        $search_term = $request->input('search');
        $emailResults = $user->emails()->where( 'provider', 'LIKE', '%' . $search_term . '%' )
            ->orWhere( 'email', 'LIKE', '%' . $search_term . '%' )
            ->orWhere( 'ref_number', 'LIKE', '%' . $search_term . '%' )
            ->orWhere( 'ref_email', 'LIKE', '%' . $search_term . '%' )
            ->orWhere( 'notes', 'LIKE', '%' . $search_term . '%' )->get();
        
        // IMPORTANT: We are searching by 'email' column which is not present in
        // 'accounts' table but present in 'emails' table. the whereHas() function helps to
        // search with sub query and takes first parameter as model name of foreign emails table, it returns 'email_id'
        // which eloquent uses to find the data
        
        $accountResults = $user->accounts()->where( 'user_name', 'LIKE', '%' . $search_term . '%' )
        ->orWhereHas('email',function($query) use ($search_term){
            $query->where('email', 'LIKE', '%' . $search_term . '%' );
        }) 
        ->orWhere( 'domain_name', 'LIKE', '%' . $search_term . '%' )
        ->orWhere( 'domain_link', 'LIKE', '%' . $search_term . '%' )
        ->orWhere( 'notes', 'LIKE', '%' . $search_term . '%' )->get();
        
            $errorMsgEmail = null;
            $errorMsgAccount = null;
            if(count($emailResults) > 0){
                
            }else{
                $errorMsgEmail = "No Data Found!!";
            }
            if(count($accountResults) > 0){
                
            }else{
                $errorMsgAccount = "No Data Found!!";
            }

            return view('searchResult')->with('errorMsgEmail', $errorMsgEmail)
                                       ->with('errorMsgAccount', $errorMsgAccount)
                                       ->with('search_term', $search_term)
                                       ->with('emailResults', $emailResults)
                                       ->with('accountResults', $accountResults);
    }
}
