@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Emails <span class="float-right"><a href="listings/create" class="btn btn-primary">Create Listing</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($emails))
                        <?php
                            $cnt = 0;
                        ?>
                        @foreach ($mailboxes as $mailbox)
                            <h3>{{$mailbox->provider}}</h3>
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($emails as $email)
                                        <tr>
                                        <td scope="row">{{$email->email}}</td>
                                            <td>{{$email->password}}</td>
                                            <td class="float-right"><a class="btn btn-primary" href="listings/{{$email->id}}/edit">Edit</a></td>
                                            <td class="float-right">
                                                <form action="/listings/{{$email->id}}" method="post">
                                                    @csrf 
                                                    @method('delete')

                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form> 
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection