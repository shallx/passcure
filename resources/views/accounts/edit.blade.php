@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header">Add Account <span class="float-right"><a href="/accounts" class="btn btn-secondary">Back</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form action="/accounts/{{$account->id}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="email">Edit Account</label>
                            <select class="form-control" name="email_id" >
                                @foreach ($emails as $email)
                                    @if($email->id == $account->email_id) 
                                        <option value="{{$email->id}}" selected>{{$email->email}}</option>
                                    @else 
                                        <option value="{{$email->id}}">{{$email->email}}</option>
                                    @endif
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="catagory">Catagory</label>
                            <select class="form-control" name="catagory_id" >
                                @foreach ($catagories as $catagory)
                                    @if($catagory->id == $account->catagory_id)
                                        <option value="{{$catagory->id}}" selected>{{$catagory->account_type}}</option>
                                    @else
                                        <option value="{{$catagory->id}}">{{$catagory->account_type}}</option>
                                    @endif
                                @endforeach
                            </select>
                            </div>
                        <div class="form-group">
                            <label for="user_name">User Name</label>
                        <input type="text" name="user_name" id="" class="form-control" placeholder="Enter your Username" value="{{$account->user_name}}">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="text" name="password" id="" class="form-control" placeholder="Enter Password" value="{{$account->password}}">
                        </div>
                        <div class="form-group">
                          <label for="domain_name">Website Name</label>
                          <input type="text" name="domain_name" id="" class="form-control" placeholder="Enter Platform/Website name" value="{{$account->domain_name}}">
                        </div>
                        <div class="form-group">
                          <label for="domain_link">Domain Link</label>
                          <input type="text" name="domain_link" id="" class="form-control" placeholder="Enter website" value="{{$account->domain_link}}">
                        </div>
                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <textarea type="text" name="notes" id="" class="form-control" placeholder="Enter Additional Notes" rows=4 style="resize:none">{{$account->notes}}</textarea>
                        </div>
                
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection