<?php

namespace App\Http\Controllers;

use App\User;
use App\Email;
use App\Mailbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class EmailsController extends Controller
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
        $emails = $user->emails()->orderBy('provider', 'asc')->get();
        $data = $user->emails()->orderBy('provider', 'asc')->groupBy('provider')->select(DB::raw('count(*) as totals,provider'))->get(); //finding count as grouped
        $group = $user->emails()->orderBy('provider', 'asc')->get()->groupBy(function($item){
            return $item->provider;
        });
        $emails2 = Email::where('user_id', $user_id)->orderBy('provider', 'asc')->get(); //Alternative (bad solution)
        $mailboxes = Mailbox::all();
        //dd( $group);

        return view('emails/index')->with('emails', $group)->with('mailboxes', $mailboxes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emails/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'provider' => 'required',
        ]);
        $email = new Email;
        $email->email = $request->input('email');
        $email->password = $request->input('password');
        $email->provider = $request->input('provider');
        $email->user_id = auth()->user()->id;
        if($request->input('ref_number')) $email->ref_number = $request->input('ref_number');
        if($request->input('ref_email')) $email->ref_email = $request->input('ref_email');
        $email->save();

        return redirect('/emails/')->with('success', 'Sucessfully Inserted Email!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
