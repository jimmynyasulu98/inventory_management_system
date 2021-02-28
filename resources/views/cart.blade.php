@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                    Items in Shopping cart
                </h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                @if(Session::has('cart'))
                    <div class="row">
                        <div class= "col-sm-6 col-md-5 pl-5">
                            <ul class="list-group">
                                @foreach($stockItems as $item)
                                    <li class="list-group-item">
                                       <div class="row">
                                           <div class="col-xs-12">
                                             <strong>{{$item['item']['item']}}</strong>
                                           </div>
                                           <div class="col-xs-12 pl-5">
                                             <span class=" badge badge-primary">{{$item['price']}}</span>
                                           </div>
                                           <div class="col-xs-12 pl-5">
                                             <strong class ="pl-1">{{$item['item']['size']}}</strong>
                                           </div>
                                           <div class="col-xs-12 pl-2">
                                              <div class = "btn-group">
                                                 <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">Edit</button>
                                                    <ul class="dropdown-menu text-success">
                                                      <li> <a href="/reduce-by-one/{{$item['item']['id']}}"> Reduce by one</a> </li>
                                                      <li> <a href="/remove-item/{{$item['item']['id']}}"> Remove this item</a> </li>
                                                    </ul>
                                              </div>
                                           </div>

                                          <div class="col-xs-12 pl-3">
                                              <span class="badge badge-success">{{$item['quantity']}}</span>
                                          </div>
                                       </div>

                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class= "col-sm-6 col-md-4 lp-4 pl-5 pt-2">
                            <Strong>MK{{$totalPrice}}</Strong>
                        </div>
                    </div>
                    <form action="/buy-item" method="POST">
                        {{csrf_field()}}
                        <div class ="form-group" >
                            <label>Payment method</label>
                            <select name = "paymentMethod" class = "form-control">
                                <option value="" selected disabled>Please select payment method</option>
                                <option value = "Mpamba"> Mpamba</option>
                                <option value = "AirtelMoney"> Airtel Money</option>
                                <option value = "Visa"> Visa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="number" name = "amount" class="form-control" placeholder="Enter Amount" id="amount">
                        </div>

                        <button type="submit" class="btn btn-primary">Buy</button>
                    </form>
                @else
                    <div class="row">
                        <div class= "col-sm-6 col-md-4">
                            <h2>No items</h2>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
