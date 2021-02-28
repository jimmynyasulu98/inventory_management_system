@extends('layouts.master')


@section('content')

    <div class="row">

        <div class="container " >
            <div class="card shadow">

                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                >
                    <h6 class="m-0 font-weight-bold text-primary">
                        Add Item to Stock
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
                                <th>Supplier</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Size</th>
                                <th>Colour</th>
                                <th>Brand</th>
                                <th>Srice</th>
                                <th>Add Item</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $row)
                                <tr>
                                    <td>{{$row -> supplierName}}</td>
                                    <td>{{$row ->item }}</td>
                                    <td>{{$row ->quantity}}</td>
                                    <td>{{$row ->size}}</td>
                                    <td>{{$row ->colour}}</td>
                                    <td>{{$row ->brand}}</td>
                                    <td>{{$row ->price}}</td>
                                    <td>
                                        <a href="/add-to-stock/{{$row->id}}" class = "btn btn-primary" > Add</a>
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
