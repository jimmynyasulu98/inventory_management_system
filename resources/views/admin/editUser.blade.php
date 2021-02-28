
@extends('layouts.master')


@section('content')
    <div class="row">

        <div class="container " >
            <div class="card shadow">

                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                >
                    <h6 class="m-0 font-weight-bold text-primary">
                        Add supplier
                    </h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action = "/update-user/{{$user->id}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class ="form-group">
                            <label>Name</label>
                            <input type="text" name = "username" value ="{{$user->name}}" class = "form-control">

                        </div>
                        <div class ="form-group" >
                            <label>Edit here</label>
                             <select name = "user_type" class = "form-control">
                                 <option value="" selected disabled>Please select</option>
                                 <option value = "supplier"> supplier</option>
                                 <option value = "normalUser"> Normal user</option>
                             </select>
                        </div>
                        <button type = "submit" class = "btn btn-success" > Update</button>
                        <a href="/addsupplier" class = "btn btn-primary" > back</a>

                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
