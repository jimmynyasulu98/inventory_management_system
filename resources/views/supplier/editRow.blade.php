
@extends('layouts.supplier')


@section('content')
    <div class="row">

        <div class="container " >
            <div class="card shadow">

                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                >
                    <h6 class="m-0 font-weight-bold text-primary">
                        Edit values
                    </h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action = "/update-row/{{$row->id}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class ="form-group">
                            <label>Name</label>
                            <input type="text" name = "item" value ="{{$row->item }}" class = "form-control">
                        </div>
                        <div class ="form-group">
                            <label>Quantity</label>
                            <input type="text" name = "quantity" value ="{{$row->quantity}}" class = "form-control">
                        </div>
                        <div class ="form-group" >
                            <label>size</label>
                            <select name = "size" class = "form-control">
                                <option value="" selected disabled>{{$row->size}}</option>
                                <option value = "small"> small</option>
                                <option value = "medium"> medium</option>
                                <option value = "large"> large</option>
                            </select>
                        </div>
                        <div class ="form-group">
                            <label>Colour</label>
                            <input type="text" name = "colour" value ="{{$row->colour}}" class = "form-control">
                        </div>
                        <div class ="form-group">
                            <label>Brand</label>
                            <input type="text" name = "brand" value ="{{$row->brand}}" class = "form-control">
                        </div>
                        <div class ="form-group">
                            <label>Price</label>
                            <input type="number" name = "price" value ="{{$row->price}}" class = "form-control">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Comment:</label>
                            <textarea class="form-control" type="number"  name = "comment" id="message-text"></textarea>
                        </div>

                        <button type = "submit" class = "btn btn-success" > Update</button>
                        <a href="/recently-supplied" class = "btn btn-primary" > back</a>

                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
