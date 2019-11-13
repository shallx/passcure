@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Accounts <span class="float-right"><a href="accounts/create" class="btn btn-secondary">Add Account</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Sort By Catagories,Accounts or Email --}}
                    <div class="SortBy clearfix mb-2">
                        <a href="/SortByCat" class="btn btn-outline-primary float-left p-1 mx-1 ">Sort By Catagory</a>
                        <a href="/SortByAcc" class="btn btn-outline-primary float-left p-1 mx-1 ">Sort By Accounts</a>
                        <a href="/SortByEmail" class="btn btn-outline-primary float-left p-1 mx-1 ">Sort By Email</a>
                        <a href="/GroupByCat" class="btn btn-outline-primary float-left p-1 mx-1 ">Group By Catagory</a>
                    </div>
                    

                    @if(count($emails))
                        <table class="table table-bordered table-dark">
                            <thead class="text-center">
                                <th class="bg-warning text-dark" scope="col">Web Name</th>
                                <th class="bg-warning text-dark" scope="col">Email</th>
                                <th class="bg-warning text-dark" scope="col">user_name</th>
                                <th class="bg-warning text-dark" scope="col">Password</th>
                                <th class="bg-warning text-dark" scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($emails as $email)
                                    @foreach ($email->accounts as $account)
                                    <tr>
                                        <td>{{$account->domain_name}}</td>
                                        <td>{{$account->email->email}}</td>
                                        <td>{{$account->user_name}}</td>
                                        <td>{{$account->password}}</td>
                                        <td>
                                            <a class="btn btn-success float-left p-1 mx-1" href="accounts/{{$account->id}}">Show</a>
                                            <a class="btn btn-primary float-left p-1 mx-1" href="accounts/{{$account->id}}/edit">Edit</a>
                                                <form action="/accounts/{{$account->id}}" method="post" class="float-left">
                                                    @csrf 
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger p-1 mx-1">Delete</button>
                                                </form>
                                                
                                        </td>
                                    </tr>
                                        
                                    @endforeach
                            </tbody>
                            
                                

                            @endforeach
                        </table>
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