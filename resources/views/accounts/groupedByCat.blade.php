@extends('layouts.app')

@section('content')
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
                    <h6>Are you sure You want to <span class="text-danger">Delete</span> this account?</h6>
                    <p>Press <span class="text-success">Confirm</span> to Delete!!</p>
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
    <!--Modal Close-->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header">Accounts <span class="float-right"><a href="accounts/create" class="btn btn-primary">Add Account</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="ml-2 mb-2">Show all-> <button type="button" class="showAllBtn btn p-0" ><i class="far fa-eye text-success p-0"></i></i></button></p>

                    {{-- Sort By Categories,Accounts or Email --}}
                    <div class="SortBy clearfix mb-3">
                        <a href="/SortByCat" class="btn btn-outline-primary float-left p-1 mx-1 ">Sort By Category</a>
                        <a href="/SortByAcc" class="btn btn-outline-primary float-left p-1 mx-1 ">Sort By Accounts</a>
                        <a href="/SortByEmail" class="btn btn-outline-primary float-left p-1 mx-1 ">Sort By Email</a>
                        <a href="/GroupByCat" class="btn btn-primary float-left p-1 mx-1 ">Group By Category</a>
                        <a href="/GroupByEmail" class="btn btn-outline-primary float-left p-1 mx-1 ">Group By Email</a>
                    </div>
                    

                    @if(count($accounts))
                        @foreach ($accounts as $category_id => $accounts)
                            <h4 class="text-center "><b>{{$cat_listArray[$category_id]}}</b></h4>

                            
                            <table class="table table-bordered table-dark">
                                <thead class="text-center">
                                    <th class="bg-warning text-dark" scope="col">Web Name</th>
                                    <th class="bg-warning text-dark" scope="col">Email</th>
                                    <th class="bg-warning text-dark" scope="col">user_name</th>
                                    <th class="bg-warning text-dark" scope="col">Password</th>
                                    <th class="bg-warning text-dark" scope="col">Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($accounts as $account)
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
                                </tbody>
                                
                                    
    
                                @endforeach
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
    <script type="text/javascript" src="{{asset('js/togglePassVis.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".delete").click(function() {
                id = $(this).attr("data-did");
                var x = document.getElementsByClassName('deleteForm');
                for(i=0; i<x.length;i++){
                    x[i].action = "/accounts/" + id;
                }
            });
        });
    </script>
@endsection