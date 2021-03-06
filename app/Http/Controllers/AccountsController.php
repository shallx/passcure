<?php

namespace App\Http\Controllers;

use App\User;
use App\Email;
use App\Account;
use App\Category;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $accounts = $user->accounts()->orderBy('domain_name', 'asc')->get();
        return view('accounts.index')->with('accounts', $accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $emails = $user->emails()->get();
        $categories = Category::all(); 
        return view('accounts/create')->with('emails', $emails)->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $validated = $request->validate([
            'email_id' => 'required',
            'password' => 'required',
            'domain_name' => 'required',
        ]);
        $account = new Account;
        $account->user_id = $user_id;
        $account->email_id = $request->input('email_id');
        $account->category_id = $request->input('category_id'); 
        if($request->input('user_name')) $account->user_name = $request->input('user_name');
        $account->password = $request->input('password');
        $account->domain_name = $request->input('domain_name');
        $account->domain_link = $request->input('domain_link');
        if($request->input('notes')) $account->notes = $request->input('notes');
        $account->save();
        return redirect('/accounts/')->with('success', 'Account successfully added!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user()->id;
        $account = Account::find($id);
        if($account->email->user_id != $user) return redirect('/accounts/');
        return view('accounts.show')->with('account', $account);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $emails = $user->emails()->get();
        $account = Account::find($id);
        $categories = Category::all(); // Category is model name with wrong spelling but functional
        if($account->email->user_id != $user_id) return redirect('/accounts/');
        return view('accounts.edit')->with('account', $account)->with('emails', $emails)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'email_id' => 'required',
            'password' => 'required',
            'domain_name' => 'required',
        ]);
        $account = Account::find($id);
        $account->email_id = $request->input('email_id');
        $account->category_id = $request->input('category_id'); 
        if($request->input('user_name')) $account->user_name = $request->input('user_name');
        $account->password = $request->input('password');
        $account->domain_name = $request->input('domain_name');
        $account->domain_link = $request->input('domain_link');
        if($request->input('notes')) $account->notes = $request->input('notes');
        $account->save();
        return redirect('/accounts/')->with('success', 'Account edited successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        $account = Account::find($id);
        $account->delete();
        return redirect('/accounts/')->with('success', 'Successfully Deleted Account');
    }

    public function SortByCat(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $accounts = $user->accounts()->orderBy('category_id', 'asc')->orderBy('domain_name', 'asc')->get(); 
        return view('accounts.index')->with('accounts', $accounts);
    }

    public function SortByAcc(){
        $user = User::find(auth()->user()->id);
        $accounts = $user->accounts()->orderBy('domain_name', 'asc')->get();;
        return view('accounts.index')->with('accounts', $accounts);
    }

    public function SortByEmail(){
        $user = User::find(auth()->user()->id);
        $accounts = $user->accounts()->orderBy('email_id', 'asc')->get();
        return view('accounts.index')->with('accounts', $accounts);
    }

    public function GroupByEmail(){
        $authUser = auth()->user()->id;
        $user = User::find($authUser);
        $emails = $user->emails;
        $accounts = $user->accounts()->orderBy('email_id', 'asc')->orderBy('domain_name', 'asc')->get()->groupBy(function($item){
            return $item->email_id;
        });;
        $emailArr = array();
        foreach($emails as $email){
            $emailArr[$email->id] = $email->email;
        }
 
        return view('accounts.groupedByEmail')->with('accounts', $accounts)->with('emailArr', $emailArr);
    }

    public function GroupByCat(){
        $authUser = auth()->user()->id;
        $user = User::find($authUser);
        $accounts = $user->accounts()->orderBy('category_id', 'asc')->orderBy('domain_name', 'asc')->get()->groupBy(function($item){
            return $item->category_id;
        });
        $categories = Category::all();
        $cat_listArray = array();
        foreach($categories as $cat){
            $cat_listArray[$cat->id] = $cat->account_type;
        }

        return view('accounts.groupedByCat')->with('accounts', $accounts)->with('cat_listArray', $cat_listArray);
    }

    public function CheckCategory(){
        $cat_checker = Category::all();
        return view('accounts.addCat')->with('categories', $cat_checker);

    }

    public function AddCategory(Request $responce){
        $category = new Category;
        $category->account_type = $responce->input('category');
        $category->save();
        $cat_checker = Category::all();
        return view('accounts.addCat')->with('categories', $cat_checker);;
    }

    
}