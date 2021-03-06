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

                        {{$items->links()}}

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
                        Supplieble Items
                    </h6>

                </div>

                <div class="card-body">
                    <div class ="table-responsive">
                        <table class="table table-dark table-striped">
                            <thead class = "text-primary">
                            <tr>
                                <th>Item ID</th>
                                <th>Item name</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item ->id}}</td>
                                    <td>{{$item -> name}}</td>


                                </tr>


                            @endforeach

                            </tbody>
                        </table>
                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#Modal">Add</button>

                        {{$items->links()}}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
