@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="container " >
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
                                <th>supplier balance</th>
                                <th>Action</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($supplierbalances as $supplier)
                                <tr>
                                    <td>{{$supplier ->supplier_id}}</td>
                                    <td>{{$supplier -> supplierName}}</td>
                                    <td>{{$supplier ->balance}}</td>
                                    <td><a href="/edit-user/{{$supplier->supplier_id}}" class = "btn btn-success" >Edit</a></td>
                                    <td><a href="/pay-supplier-view/{{$supplier->supplier_id}}" class = "btn btn-success" >Pay</a></td>
                                </tr>


                            @endforeach

                            </tbody>
                        </table>

                        {{$supplierbalances->links()}}

                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
