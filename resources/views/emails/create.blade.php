@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header">Add Email <span class="float-right"><a href="/emails" class="btn btn-secondary">Back</a></span></div>

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
                          <input type="text" name="provider" id="" class="form-control" placeholder="Enter Email Provider..." aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="ref_number">Reference Number</label>
                          <input type="text" name="ref_number" id="" class="form-control" placeholder="Enter number" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                          <label for="ref_email">Reference Email</label>
                          <input type="text" name="ref_email" id="" class="form-control" placeholder="Enter reference email" aria-describedby="helpId">
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