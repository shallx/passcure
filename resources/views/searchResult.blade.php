@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search Result <span class="float-right"><a href="emails/create" class="btn btn-primary">Add Email</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($fromEmail)
                        <div class="fromEmail">
                            <h3>From Email</h3>
                            <ul class="list-group">
                                <li class="list-group-item">{{$fromEmail->ref_number}}</li>
                            </ul>
                        </div>
                    @else
                        <div class="alert alert-danger">
                            <p>No Results from User</p>
                        </div>

                    @endif

                    @if($fromUser)
                        <div class="fromuser">
                                <h3>From Email</h3>
                            <ul class="list-group">
                                <li class="list-group-item">{{$fromUser->email}}</li>
                            </ul>
                        </div>
                    @else
                        <div class="alert alert-danger">
                            <p>No Results from User</p>
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('customscript')
    <script type="text/javascript">
        $(document).ready(function() {
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
@endsection --}}