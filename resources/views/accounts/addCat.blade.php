@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header">Categories </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif     

                    @if (count($categories))
                        <h3>Following are the list of Tags available</h3>
                        <ul class="list-group mb-4">
                            @foreach($categories as $cat)
                                <li class="list-group-item">{{$cat->account_type}}</li>
                            @endforeach
                        </ul>
                            
                            
                    @else
                    <h3 class="alert alert-danger">Sorry No Category Exist</h3>
                        
                            
                    @endif

                        
                        
                    <h4 class="clearfix">Add Categories Name</h4>
                    <form action="/AddCats" method="POST" class="form-inline mt-3">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="category" id="" class="form-control"  placeholder="Add Category here">
                        </div>
                        <input type="submit" class="btn btn-primary ml-2" value="Add">
                    </form>
                        
                        
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customscript')
    
@endsection