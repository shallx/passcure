@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Emails <span class="float-right"><a href="emails/create" class="btn btn-primary">Add Email</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($emails))
                        @foreach ($emails as $key => $mails)
                            {{-- @foreach ($mailboxes as $mailbox) --}}
                                {{-- <h3>{{$mailbox->provider}}</h3> --}}
                                <h3>{{$key}}</h3>
                                <table class="table table-stripped">
                                    <thead>
                                        <tr>
                                            <th class="w-50">Email</th>
                                            <th class="w-50">Password</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($mails as $email)
                                            <tr>
                                                <td scope="row">{{$email->email}}</td>
                                                <td>{{$email->password}} 
                                                    <a class="btn btn-primary float-right" href="emails/{{$email->id}}/edit">Edit</a>
                                                        <form action="/emails/{{$email->id}}" method="post" class="float-right">
                                                            @csrf 
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form> 
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>                              
                            {{-- @endforeach --}}
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection