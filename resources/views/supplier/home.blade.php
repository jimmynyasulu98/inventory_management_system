@extends('layouts.supplier')

@section('content')
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                >
                    <h6 class="m-0 font-weight-bold text-primary">
                        Recent Activity
                    </h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">

                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                >
                    <h6 class="m-0 font-weight-bold text-primary">
                        Items suppliable
                    </h6>

                </div>

                <div class="card-body">
                    <div class ="table-responsive">
                        <table class="table">
                            <thead class = "text-primary">
                            <tr>
                                <th>item id</th>
                                <th>item name</th>

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
                        {{$items->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
