@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header">Email Info <span class="float-right"><a href="/emails/" class="btn btn-secondary">Back</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="show_email_content">
                        @if($email)
                        <div class="row">
                                <div class="col-md-6 p-2 border rounded">Email </div><div class="col-md-6 p-2 border rounded">{{$email->email}}</div>
                                <div class="col-md-6 p-2 border rounded">Password </div><div class="col-md-6 p-2 border rounded">{{$email->password}}</div>
                                <div class="col-md-6 p-2 border rounded">Provider </div><div class="col-md-6 p-2 border rounded">{{$email->provider}}</div>
                                <div class="col-md-6 p-2 border rounded">Reference Number </div><div class="col-md-6 p-2 border rounded">{{$email->ref_number}}</div>
                                <div class="col-md-6 p-2 border rounded">Reference Account </div><div class="col-md-6 p-2 border rounded">{{$email->ref_email}}</div>
                                <div class="col-md-6 p-2 border rounded">Notes </div><div class="col-md-6 p-2 border rounded">{{$email->notes}}</div>
                        </div>
                            {{-- <ul class="list-group">
                                
                                <li class="list-group-item">{{$email->email}}</li>
                                <li class="list-group-item">{{$email->password}}</li>
                                <li class="list-group-item">{{$email->provider}}</li>
                                <li class="list-group-item">{{$email->ref_number}}</li>
                                <li class="list-group-item">{{$email->ref_email}}</li>
                                <li class="list-group-item">{{$email->notes}}</li>
                                
                            </ul> --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection