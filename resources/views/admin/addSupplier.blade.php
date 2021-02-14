
@extends('layouts.master')


@section('content')
    <div class="row">
        <!-- Area Chart -->
        <div class="container " >
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                >
                    <h6 class="m-0 font-weight-bold text-primary">
                       Add a supplier
                    </h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class ="table-responsive">
                        <table class="table">
                            <thead class = "text-primary">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>user type</th>
                                <th>make supplier</th>
                                <th>make admin</th>
                                <th>Delete user</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $users)
                            <tr>
                                <td>{{$users -> name}}</td>
                                <td>{{$users -> email}}</td>
                                <td>{{$users -> user_type}}</td>
                                <td>
                                    <a href="#" class ="btn btn-success">add</a>
                                </td>
                                <td>
                                    <a href="#" class ="btn btn-success">add</a>
                                </td>
                                <td>
                                    <a href="#" class ="btn btn-danger">delete</a>
                                </td>


                            </tr>
                            @endforeach
                            {{$user->links()}}
                            </tbody>


                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
