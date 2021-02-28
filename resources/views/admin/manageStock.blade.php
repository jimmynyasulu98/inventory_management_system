@extends('layouts.master')


@section('content')
    <div class="row">

        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">

                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                >
                    <h6 class="m-0 font-weight-bold text-primary">
                        Manage Stock
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class ="table-responsive">
                        <table class="table">
                            <thead class = "text-primary">
                            <tr>
                                <th>Stock id</th>
                                <th>Name</th>
                                <th>Colour</th>
                                <th>available</th>
                                <th>Price(Mk)</th>
                                <th>Action</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stocks as $stock)
                                <tr>
                                    <td>{{$stock ->id }}</td>
                                    <td>{{$stock -> item}}</td>
                                    <td>{{$stock -> colour}}</td>
                                    <td>{{$stock -> quantity}}</td>
                                    <td>{{$stock -> price_each}}</td>

                                    <td>
                                        <a href="/edit-stock/{{$stock ->id }}" class ="btn btn-success">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            {{$stocks->links()}}
                            </tbody>


                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">

                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                >
                    <h6 class="m-0 font-weight-bold text-primary">
                        Edit Stock Items
                    </h6>

                </div>

                <div class="card-body">
                    <div class="container-fluid" style="border:1px solid #cecece;">
                        <div class="row">
                            <div class="col-xs-12"><Strong> Stock Id : </Strong></div>

                            <div class="col-xs-12 pl-3"> <span class=" badge badge-primary"></span> </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12 "> <strong>Price per item : </strong></div>
                            <div class="col-xs-12 pl-2 text-primary"><strong></strong></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12 "> <strong>Available : </strong></div>
                            <div class="col-xs-12 pl-2 text-primary"><strong></strong></div>
                        </div>
                        <br>
                    </div>
                    <br>
                    <div class="container-fluid " style="border:2px solid #cecece;">
                        <div class="row">
                            <div class="col-xs-12 "> <strong>Size  </strong></div>
                            <div class="col-xs-12 pl-5"> <strong>Colour  </strong></div>
                            <div class="col-xs-12 pl-5"> <strong>Brand </strong></div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 text-primary"><strong></strong></div>
                            <div class="col-xs-12 pl-5 text-primary"><strong></strong></div>
                            <div class="col-xs-12 pl-5 text-primary"><strong></strong></div>
                            <br>
                        </div>
                        <br>
                    </div>
                    <br>

                    <br>
                    <div class="row">

                        <div class="col-xs-12 pl-2"> <a href="#" class = "btn btn-success" >Update</a> </div>

                        <div class="col-xs-12 pl-5"> <a href="#" class = "btn btn-danger" >Delete</a></div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
@endsection
