@extends('layouts.master')


@section('content')

<div class="row">

    <div class="container " >
        <div class="card shadow">

            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                   SET PRICE FOR ONE ITEM
                </h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action = "/add-item/{{$row->id}}" method="POST">
                    {{csrf_field()}}

                    <div class ="form-group">
                        <label>Prirce</label>
                        <input type="number" name = "price" placeholder="Enter price here" class = "form-control">
                    </div>
                    <div class ="form-group" >
                        <label>Add an image type</label>
                        <select name = "imagePath" class = "form-control">
                            <option value="" selected disabled>select image type</option>
                            <option value = "/images/wine.jpg">Wine</option>
                            <option value = "/images/spirits.jpg">Spirits</option>
                            <option value = "/images/softdrink.jpg">Soft Drink</option>
                            <option value = "/images/beer1.jpg"> Beer</option>
                            <option value = "/images/juices.jpg"> Juices</option>
                            <option value = "/images/ciders.jpg">Ciders</option>
                        </select>
                    </div>

                    <button type = "submit" class = "btn btn-success" > Add</button>
                    <a href="/add-to-stock-list" class = "btn btn-primary" > back</a>

                </form>

            </div>
        </div>
    </div>

</div>
@endsection
