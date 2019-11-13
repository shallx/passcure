@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" id="main">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <h3 class="text-center" >You are Logged in to the Dashboard</h3>

                   <h4 class="mb-3 " style="margin-top:100px"><b>Here is what you can do with your account</b></h4>

                   <ul>
                       <li>Add New Email</li>
                       <li>Change, delete or view specific Email</li>
                       <li>Add New Account</li>
                       <li>Change, delete or view specific Account</li>
                       <li>Sort Account By Catagory</li>
                       <li>Sort Account By Email</li>
                       <li>Sort Account By Domain</li>
                       <li>Group Account By Catagory</li>
                       <li>Add new catagories</li>
                   </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
