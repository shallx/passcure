@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Email <span class="float-right"><a href="listings/create" class="btn btn-primary">Create Listing</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form action="/emails" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" name="email" id="" class="form-control" placeholder="Enter Email..." aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" name="password" id="" class="form-control" placeholder="Enter Password" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="provider">Provider</label>
                          <input type="text" name="provider" id="" class="form-control" placeholder="Enter Email..." aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="ref_number">Reference Number</label>
                          <input type="text" name="ref_number" id="" class="form-control" placeholder="Enter number" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="ref_email">Reference Email</label>
                          <input type="text" name="ref_email" id="" class="form-control" placeholder="Enter password" aria-describedby="helpId">
                        </div>
                
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection