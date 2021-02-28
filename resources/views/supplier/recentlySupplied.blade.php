@extends('layouts.supplier')


@section('content')
    <div class="row">

        <div class="container " >
            <div class="card shadow">

                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                >
                    <h6 class="m-0 font-weight-bold text-primary">
                        Recently Supplied items
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
                                <th>User Id</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Size</th>
                                <th>Colour</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Date Supplied</th>
                                <th>Edit</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $row)
                                <tr>
                                    <td>{{$row -> supplier_id}}</td>
                                    <td>{{$row ->item }}</td>
                                    <td>{{$row ->quantity}}</td>
                                    <td>{{$row ->size}}</td>
                                    <td>{{$row ->colour}}</td>
                                    <td>{{$row ->brand}}</td>
                                    <td>{{$row ->price}}</td>
                                    <td>{{$row ->created_at}}</td>

                                    <td>
                                        <a href="/edit-row/{{$row->id}}" class ="btn btn-success">edit</a>
                                    </td>


                                </tr>
                            @endforeach
                            </tbody>


                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
