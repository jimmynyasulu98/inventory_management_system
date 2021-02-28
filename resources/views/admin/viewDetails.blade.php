@extends('layouts.master')

@section('content')
    <div class="row">

        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">

                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                >
                    <h6 class="m-0 font-weight-bold text-primary">
                        Recently Supplied
                    </h6>

                </div>

                <div class="card-body">
                    <div class ="table-responsive">
                        <table class="table ">
                            <thead class = "text-primary">
                            <tr>
                                <th>Supplier ID</th>
                                <th>Supplier name</th>
                                <th>Item name</th>
                                <th>Quantity</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($supplied as $item)
                                <tr>
                                    <td>{{$item ->supplier_id}}</td>
                                    <td>{{$item -> supplierName}}</td>
                                    <td>{{$item -> item}}</td>
                                    <td>{{$item -> quantity}}</td>
                                    <td><a href="/view-item/{{$item->id}}" class = "btn btn-success" >View</a></td>
                                </tr>


                            @endforeach

                            </tbody>
                        </table>

                        {{$supplied->links()}}

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
                       More Details
                    </h6>

                </div>

                <div class="card-body">
                    <div class="container-fluid" style="border:1px solid #cecece;">
                        <div class="row">
                            <div class="col-xs-12"><Strong> Supplier Id : </Strong></div>

                            <div class="col-xs-12 pl-3"> <span class=" badge badge-primary">{{$suppliedDetails->supplier_id}}</span> </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 "> <strong>Supplier name : </strong></div>
                            <div class="col-xs-12 pl-2 text-primary"><strong>{{$suppliedDetails->supplierName}}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 "> <strong>Price Charged : </strong></div>
                            <div class="col-xs-12 pl-2 text-primary"><strong>MK{{$suppliedDetails->price}}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 "> <strong>Quantity : </strong></div>
                            <div class="col-xs-12 pl-2 text-primary"><strong>{{$suppliedDetails->quantity}}</strong></div>
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
                            <div class="col-xs-12 text-primary"><strong>{{$suppliedDetails->size}}</strong></div>
                            <div class="col-xs-12 pl-5 text-primary"><strong>{{$suppliedDetails->colour}}</strong></div>
                            <div class="col-xs-12 pl-5 text-primary"><strong>{{$suppliedDetails->brand}}</strong></div>
                            <br>
                        </div>
                        <br>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12 pl-2"> <strong>Comment </strong></div>
                    </div>

                    <div class="container-fluid" style="border:1px solid #cecece;">

                        <div class="row">
                            <div class="col-xs-12">{{$suppliedDetails->comment}} </div>
                        </div>
                        <br>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12 pl-2"> <strong>Outstanding balance for {{$suppliedDetails->supplierName}}: </strong></div>
                        <div class="col-xs-12 pl-2 text-danger"> <strong>Mk{{$supplierbalance->balance}}</strong></div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-xs-12 "> <a href="/add-to-stock/{{$suppliedDetails->id}}" class = "btn btn-success" >Add to Stock</a> </div>
                        <div class="col-xs-12 pl-5"> <a href="/pay-supplier-view/{{$suppliedDetails->supplier_id}}" class = "btn btn-primary" >Pay</a></div>
                        <div class="col-xs-12 pl-5"> <a href="#" class = "btn btn-danger" >Reject</a></div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
