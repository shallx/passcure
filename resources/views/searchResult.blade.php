@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Search Results ( {{count($accountResults)}} ) <span class="float-right"><a href="peoples" class="btn btn-default border">Back</a></span></div> 
                <div class="card-body mt-2">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        @if(count($accountResults))
                            <div class="col-12 p-0">
                                <h3 class="text-center border rounded p-3 bg-dark text-white"><b>ACCOUNT RESULTS </b></h3>
                            </div>
                            <table class="table table-bordered table-dark">
                                <thead class="text-center">
                                    <th class="bg-warning text-dark" scope="col">Web Name</th>
                                    <th class="bg-warning text-dark" scope="col">Email</th>
                                    <th class="bg-warning text-dark" scope="col">user_name</th>
                                    <th class="bg-warning text-dark" scope="col">Password</th>
                                    <th class="bg-warning text-dark" scope="col">Action</th>
                                </thead>
                                <tbody>
                                    <?php $x = 1?>
                                    @foreach ($accountResults as $account)
                                        <tr>
                                            <td>{{$account->domain_name}}</td>
                                            <td>{{$account->email->email}}</td>
                                            <td>{{$account->user_name}}</td>
                                            <td class="pass{{$account->id}}"><input type="password" class="form-control-plaintext text-white p-0 m-0" value="{{$account->password}}"></td>
                                            <td>
                                                <a class="btn btn-outline-success float-left p-1 mx-1" href="accounts/{{$account->id}}">Show</a>
                                                <a class="btn btn-outline-primary float-left p-1 mx-1" href="accounts/{{$account->id}}/edit">Edit</a>
                                                <button type="button" class="delete btn btn-outline-danger p-1 mx-1" data-toggle="modal" data-target="#deleteModal" data-did="{{$account->id}}">
                                                    Delete
                                                </button>
                                                <button type="button" class="btn p-0 showBtn" data-id="{{$account->id}}"><i class="far fa-eye text-success p-0"></i></i></button>                                    
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @else
                                <div class="col-12">
                                    <div class="alert alert-danger"><h6>Account: {{$errorMsgAccount}}</h6></div>
                                </div>
                                
                        @endif

                        @if(count($emailResults))
                            <div class="col-12 p-0">
                                <h3 class="text-center border rounded p-3 bg-dark text-white"><b>EMAIL RESULTS </b></h3>
                            </div>
                            <table class="table table-bordered table-dark">
                                <thead>
                                    <tr class="text-center">
                                        <th class="w-50 bg-warning text-dark" scope="col">Email</th>
                                        <th class="w-25 bg-warning text-dark" scope="col">Password</th>
                                        <th class="w-25 bg-warning text-dark" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($emailResults as $email)
                                        <tr>
                                            <td scope="row">{{$email->email}}</td>
                                            <td class="pass{{$email->id}}"><input type="password" class="form-control-plaintext text-white" value="{{$email->password}}"></td>
                                            <td>
                                                <a class="btn btn-outline-success float-left p-1 mx-1" href="emails/{{$email->id}}">Show</a>
                                                <a class="btn btn-outline-primary float-left p-1 mx-1" href="emails/{{$email->id}}/edit">Edit</a>
                                                <button type="button" class="delete btn btn-outline-danger p-1 mx-1" data-toggle="modal" data-target="#deleteModal" data-did="{{$email->id}}">
                                                    Delete
                                                </button>
                                                <button type="button" class="btn p-0 showBtn" data-id="{{$email->id}}"><i class="far fa-eye text-success p-0"></i></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>                              
                                
                            @else
                                <div class="col-12">
                                    <div class="alert alert-danger"><h6>Email: {{$errorMsgEmail}}</h6></div>
                                </div>>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    


@endsection

@section('customscript')
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/togglePassVis.js')}}"></script>

    <script>
        //Highlight Code
        
        // jQuery(document).ready(function(){
        //     jQuery(window).on('load', function(){
        //         highlight();
        //     })
        //     function highlight(){
        //         var content = jQuery("body").html();
        //         var searchExp = new RegExp("{{$search_term}}", "ig");
        //         var matches = content.match(searchExp);
        //         console.log(matches);
        //         if(matches)
        //         {
        //             jQuery(".content").html(content.replace(searchExp, function(match){
        //                 return "<span class='highlight'>" + match + "</span>";
        //             }));
        //         }

        //     }
        // });
    </script>

@endsection
