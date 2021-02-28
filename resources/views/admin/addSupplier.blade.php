
@extends('layouts.master')


@section('content')
    <div class="row">

        <div class="container " >
            <div class="card shadow">

                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                >
                    <h6 class="m-0 font-weight-bold text-primary">
                       Add a supplier
                    </h6>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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
                                <th>Edit</th>

                                <th>Delete user</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $users)
                            <tr>
                                <td>{{$users -> name}}</td>
                                <td>{{$users -> email}}</td>

                                @if($users->user_type == "admin")
                                    <td>{{$users -> user_type}}</td>
                                @elseif($users->user_type == "supplier")
                                    <td>{{$users -> user_type}}</td>
                                @else
                                    <td>norma user</td>
                                @endif
                                <td>
                                    <a href="/edit-user/{{$users->id}}" class ="btn btn-success">edit</a>
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
