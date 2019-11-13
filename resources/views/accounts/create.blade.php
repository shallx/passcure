@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Account <span class="float-right"><a href="listings/create" class="btn btn-primary">Create Listing</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form action="/accounts" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <select class="form-control" name="email_id" >
                                @foreach ($emails as $email)
                                    <option value="{{$email->id}}">{{$email->email}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="catagory">Catagory</label>
                            <select class="form-control" name="catagory_id" >
                                @foreach ($catagories as $catagory)
                                    <option value="{{$catagory->id}}">{{$catagory->account_type}}</option>
                                @endforeach
                            </select>
                            </div>
                        <div class="form-group">
                            <label for="user_name">User Name</label>
                            <input type="text" name="user_name" id="" class="form-control" placeholder="Enter your Username" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" name="password" id="" class="form-control" placeholder="Enter Password" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="domain_name">Website Name</label>
                          <input type="text" name="domain_name" id="" class="form-control" placeholder="Enter Platform/Website name" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="domain_link">Domain Link</label>
                          <input type="text" name="domain_link" id="" class="form-control" placeholder="Enter website" aria-describedby="helpId" value="https://">
                        </div>
                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <textarea type="text" name="notes" id="" class="form-control" placeholder="Enter Additional Notes" rows=4 style="resize:none"></textarea>
                        </div>
                
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection