@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                    User Orders
                </h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class ="row">
                    <div class =" col-sm-6 col-md-4 ">

                        @foreach($orders as $order)
                            <table class ="container  pt-3">
                                <table class ="table-responsive">
                                    <table class="table">
                                        <thead class = "text-primary">
                                        <tr>
                                            <th>Item</th>
                                            <th>Size</th>
                                            <th>Colour</th>
                                            <th>Brand</th>
                                            <th>Price</th>
                                            <th>Qauntity</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($order->cart->items as $item)
                                           <tr>
                                               <td> <strong>{{$item['item']['item']}}</strong> </td>
                                               <td><strong class ="pl-4">{{$item['item']['size']}}</strong></td>
                                               <td><strong class ="pl-4">{{$item['item']['colour']}}</strong></td>
                                               <td> <strong class ="pl-4">{{$item['item']['brand']}}</strong></td>
                                               <td><span class=" badge badge-primary pl-3">{{$item['price']}}</span></td>
                                               <td><span class="badge badge-success float-right">{{$item['quantity']}}</span></td>
                                           </tr>
                                          @endforeach
                                        </tbody>

                                    </table>
                                </table>


                            </table>
                            <div class = "row d-flex">
                                <div class ="pl-2 pr-2"><strong>Total price: MK {{$order->cart->totalPrice}}</strong></div>
                                <div class =" pr-2 pl-2"><strong>Paid: MK {{$order->money_paid}}</strong></div>
                                <div class =" pr-2 pl-2"><strong>Paid through : {{$order->payment_method}}</strong> </div>
                            </div>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
