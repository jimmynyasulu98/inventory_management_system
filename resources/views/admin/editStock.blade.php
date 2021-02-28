@extends('layouts.master')


@section('content')
    <form action = "/delete-stock/{{$stockItem->id}}" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Comfirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete the selected <br> item from stock?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Comfirm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
                                <th>Price(MK)</th>
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
                                        <a href="/edit-stock/{{$stock ->id }}" class ="btn btn-success">edit</a>
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
                  <form action = "/update-stock/{{$stockItem->id}}" method="POST">
                      {{csrf_field()}}
                      {{method_field('PUT')}}
                    <div class="container-fluid" style="border:1px solid #cecece;">
                        <div class="row">
                            <div class="col-xs-12"><Strong> Stock Id : </Strong></div>
                            <div class="col-xs-12 pl-3"> <span class=" badge badge-primary">{{$stockItem->id}}</span></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12 "> <strong>Price per item in MK : </strong></div>
                            <input type="number" min="0.01" step="0.01" name = "price" value ="{{$stockItem->price_each}}"  class = "form-control">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12 "> <strong>Available : </strong></div>
                            <input type="number" min="1" step="1" name = "quantity" value ="{{$stockItem->quantity}}"  class = "form-control">
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
                            <div class="col-xs-12 text-primary"> <strong>{{$stockItem->size}}</strong></div>
                            <div class="col-xs-12 pl-5 text-primary"> <strong>{{$stockItem->colour}}</strong></div>
                            <div class="col-xs-12 pl-5 text-primary"> <strong>{{$stockItem->brand}}</strong></div>
                        </div>
                    </div>
                    <br>

                    <br>
                    <div class="row">
                        <button type = "submit" class = "btn btn-success pl-2" > Update</button>
                        <div class="col-xs-12 pl-5"> <a href="/manage-stock" class = "btn btn-primary" >Cancel</a></div>
                        <div class="col-xs-12 pl-5"><button type="button" class="btn btn-danger " data-toggle="modal" data-target="#Modal">Delete</button></div>

                    </div>
                  </form>
                </div>

            </div>
        </div>
    </div>

    </div>
@endsection
