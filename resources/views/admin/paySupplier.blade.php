@extends('layouts.master')

@section('content')
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item to be Supplied</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action = "/add-suppliable-item" method="POST">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Item name:</label>
                        <input type="text" class="form-control" name = "item" id="recipient-name">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Supply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                            <div class="col-xs-12"><Strong> Supplier Id :</Strong></div>

                            <div class="col-xs-12 pl-3"> <span class=" badge badge-primary">{{$supplierbalance ->supplier_id}} </span> </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 "> <strong>Supplier name : </strong></div>
                            <div class="col-xs-12 pl-3 text-primary"><strong>{{$supplierbalance ->supplierName}}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 "> <strong>Outstanding Balance : </strong></div>
                            <div class="col-xs-12 pl-1 text-danger"><strong>MK{{$supplierbalance ->balance}}</strong></div>
                        </div>
                        <br>
                    </div>
                    <br>
                    <div class="container-fluid " style="border:2px solid #cecece;">

                        <form action = "/pay-supplier/{{$supplierbalance->supplier_id}} " method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="amount"><strong>Pay supplier</strong></label>
                                <input type="number" name ="amount" class="form-control" id="amount" placeholder="Enter amount">
                            </div>

                            <button type="submit" class="btn btn-primary">Pay</button>
                        </form>
                        <br>
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection
