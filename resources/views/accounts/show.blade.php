@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header">Account Info <span class="float-right"><a href="/accounts/" class="btn btn-secondary">Back</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="show_email_content">
                        @if($account)
                        <div class="row">
                            <div class="col-md-6 p-2 border rounded">Account Type</div><div class="col-md-6 p-2 border rounded">{{$account->category->account_type}}</div>
                            <div class="col-md-6 p-2 border rounded">Email</div><div class="col-md-6 p-2 border rounded">{{$account->email->email}}</div>
                            <div class="col-md-6 p-2 border rounded">User Name</div><div class="col-md-6 p-2 border rounded">{{$account->user_name}}</div>
                            <div class="col-md-6 p-2 border rounded">Password</div><div class="col-md-6 p-2 border rounded">{{$account->password}}</div>
                            <div class="col-md-6 p-2 border rounded">Domain Name</div><div class="col-md-6 p-2 border rounded">{{$account->domain_name}}</div>
                            <div class="col-md-6 p-2 border rounded">Domain Link</div><div class="col-md-6 p-2 border rounded"><a href="{{$account->domain_link}}">{{$account->domain_link}}</a></div>
                            <div class="col-md-6 p-2 border rounded">Notes</div><div class="col-md-6 p-2 border rounded">{{$account->notes}}</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection