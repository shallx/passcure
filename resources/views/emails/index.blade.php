@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                                <h3 class="text-center"><b>{{$key}}</b></h3> <!-- Provider/Returned value of function($item)/Grouped by column/ -->
                                <table class="table table-bordered table-dark">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="w-50 bg-warning text-dark">Email</th>
                                            <th class="w-25 bg-warning text-dark">Password</th>
                                            <th class="w-25 bg-warning text-dark">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($mails as $email)
                                            {{-- <tr class="clickable-row" data-href='/emails/{{$email->id}}'> --}}
                                            <tr>
                                                <td scope="row">{{$email->email}}</td>
                                                <td>{{$email->password}}</td>
                                                <td>
                                                    <a class="btn btn-success float-left p-1 mx-1" href="emails/{{$email->id}}">Show</a>
                                                    <a class="btn btn-primary float-left p-1 mx-1" href="emails/{{$email->id}}/edit">Edit</a>
                                                    <form action="/emails/{{$email->id}}" method="post" class="form-inline">
                                                        @csrf 
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger p-1 mx-1">Delete</button>
                                                    </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>                              
                        @endforeach
                    @endif
                    {{-- Pagination --}}
                    {{-- <nav aria-label="Page navigation example" class="mx-auto">
                        <div class="container">
                                {{$emails->links()}}
                        </div>
                    </nav> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customscript')
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
@endsection