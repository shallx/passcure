@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel text-center">Delete Email?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-dark">
                        <h6>Are you sure You want to <span class="text-danger"><b>Delete</b></span> this email?</h6>
                        <p>Press <span class="text-success"><b>Confirm</b></span> to Delete!!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                        <form action="" method="post" class="deleteForm float-left">
                            @csrf 
                            @method('delete')
                            <button type="submit" class="confirm btn btn-danger" onclick>Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal End-->

        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header">Emails
                    <span class="float-right"><a href="emails/create" class="btn btn-primary">Add Email</a></span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <span>Show all-> <button type="button" class="showAllBtn btn p-0" ><i class="far fa-eye text-success p-0"></i></i></button>

                    @if(count($emails))
                        @foreach ($emails as $key => $mails)
                                <h3 class="text-center"><b>{{$key}}</b></h3> <!-- Provider/Returned value of function($item)/Grouped by column/ -->
                                <table class="table table-bordered table-dark">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="w-50 bg-warning text-dark" scope="col">Email</th>
                                            <th class="w-25 bg-warning text-dark" scope="col">Password</th>
                                            <th class="w-25 bg-warning text-dark" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($mails as $email)
                                            {{-- <tr class="clickable-row" data-href='/emails/{{$email->id}}'> --}}
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
                        @endforeach
                        @else
                            <div class="alert alert-danger"><h4>No Emails Found</h4></div>
                    @endif

                
                </div>
            </div>
        </div>
    </div>
@endsection


@section('customscript')
    <script type="text/javascript" src="{{asset('js/togglePassVis.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".delete").click(function() {
                id = $(this).attr("data-did");
                var x = document.getElementsByClassName('deleteForm');
                for(i=0; i<x.length;i++){
                    x[i].action = "/emails/" + id;
                }
            });
            
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });

            $(".clickable-row").hover(function(){
                $(this).css('background-color', 'gray');
            },
            
            function(){
                $(this).css('background-color', 'white')
            }
            );
        });
    </script>
@endsection