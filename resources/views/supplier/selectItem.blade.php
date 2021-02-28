
@extends('layouts.supplier')


@section('content')
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fill in Specifics</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <form action = "/supply-item" method="POST">
                     {{csrf_field()}}
                   <div class="modal-body">
                        <div class ="form-group" >
                            <label>item</label>
                            <select name = "item" class = "form-control">
                                <option value="" selected disabled>select</option>
                                @foreach($items as $item)
                                    <option value = "{{$item->name}}"> {{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Quantity:</label>
                            <input type="text" class="form-control" name ="quantity" id="recipient-name">
                        </div>
                        <div class ="form-group" >
                            <label>Size</label>
                            <select name = "size" class = "form-control">
                                <option value="" selected disabled>select size</option>
                                <option value = "small"> small</option>
                                <option value = "medium"> medium</option>
                                <option value = "large"> large</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Colour:</label>
                            <input type="text" class="form-control" name ="colour" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Brand:</label>
                            <input type="text" class="form-control" name = "brand" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Price:</label>
                            <input type="number" class="form-control" name ="price" id="price" placeholder = "Input price in Malawi kwacha">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Comment:</label>
                            <textarea class="form-control" name = "comment" id="message-text"></textarea>
                        </div>


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

        <div class="container " >
            <div class="card shadow">

                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                >
                    <h6 class="m-0 font-weight-bold text-primary">
                        Supply  Item
                    </h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class ="table-responsive">
                        <table class="table">
                            <thead class = "text-primary">
                            <tr>
                                <th>item id</th>
                                <th>item name</th>
                                <th>select</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item ->id}}</td>
                                    <td>{{$item -> name}}</td>

                                    <td>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal">select</button>
                                    </td>



                                </tr>


                            @endforeach

                            </tbody>


                        </table>
                        {{$items->links()}}
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
