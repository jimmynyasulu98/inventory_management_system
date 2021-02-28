@extends('layouts.user')

@section('content')
    <div class="container">
             <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                >
                    <h6 class="m-0 font-weight-bold text-primary">
                        Available Items
                    </h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @foreach($stockItems->chunk(3) as $stockItemChunk)
                        <div class="row">
                            @foreach($stockItemChunk as $stock)
                                <div class= "col-sm-6 col-md-4">
                                    <div class = "thumbnail border ">
                                        <img  class="img-responsive pl-5" src = "{{$stock->imagePath}}" alt = "image">
                                        <div class = "caption">
                                            <h3> {{$stock->item}} </h3>
                                            <p>Bottle size: {{$stock->size}}</p>
                                            <p>Available: {{$stock->quantity}}</p>
                                            @if ($stock->quantity > 50)
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                         aria-valuemin="0" aria-valuemax="100" style="width:{{$stock->quantity}}%">
                                                        {{$stock->quantity}} (Available)
                                                    </div>
                                                </div>
                                            @else
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
                                                         aria-valuemin="0" aria-valuemax="100" style="width:{{$stock->quantity}}%">
                                                        {{$stock->quantity}} (Running low)
                                                    </div>
                                                </div>
                                            @endif
                                            <br>
                                            <div class="d-flex">
                                                <div class ="pt-2 pl-0 price">MK{{$stock->price_each}}</div>
                                                <div class = "container float-right pb-2">
                                                    <a href ="/add-to-cart/{{$stock->id}}" class= "btn btn-success" role = "button">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    @endforeach



                </div>
             </div>
    </div>
@endsection
