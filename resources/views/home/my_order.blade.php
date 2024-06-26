<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<body>

    <!-- Header -->
        @include('home.header')
    <!-- Close Header -->

    <!-- Search Modal -->
        @include('home.search')
    <!-- End Search Model -->

<section class="h-100 gradient-custom">
<div class="container-fluid py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-10 col-xl-8">
            <div class="card" style="border-radius: 10px;">
                <div class="card-header px-4 py-5">
                    <h5 class=" mb-0">
                        @if ($user_order == 0)
                            Looks Like You Haven't Placed An Order!
                        @else
                            Thanks for your Order, <span class="text-success" >{{ $user_name }}</span>!
                        @endif
                    </h5>
                </div>

                <div class="card-body p-4">

                    @foreach ($order as $item)

                    <div class="card shadow-0 border mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="/product/{{ $item->product->image }}" class="img-fluid" alt="Phone">
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    <p class="mb-0">{{ $item->product->title }}</p>
                                </div>
                                <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                                    <p class="mb-0 small">{!! Str::limit($item->product->description,50) !!}</p>
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    <p class="mb-0 small 5rem text-bold">
                                        <i class="fa fa-rupee-sign"></i>
                                        {{ $item->product->price }}
                                    </p>
                                </div>
                                <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                    <a class="btn btn-success" href="{{url("bill/$item->id")}}" >
                                        Invoice
                                    </a>
                                </div>
                            </div>

                            <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">

                            <div class="row d-flex align-items-center">
                                <div class="col-md-2">
                                    <p class="mb-0 small">Track Order</p>
                                </div>
                                <div class="col-md-10">
                                    <div class="progress" style="height: 6px; border-radius: 16px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 
                                            @php

                                            if($item->status == 'In Progress')
                                            {
                                                echo "19%;";
                                            }
                                            elseif($item->status == 'On The Way')
                                            {
                                                echo "55%;";
                                            }
                                            else 
                                            {
                                                echo "100%;";
                                            }

                                            @endphp
                                        border-radius: 16px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-around mb-1">
                                        <p class="mt-1 mb-0 small ms-xl-5">In Progress</p>
                                        <p class="mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                                        <p class="mt-1 mb-0 small ms-xl-5">Delivered</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
</section>

    <!-- Start Footer -->
    @include('home.footer')
    <!-- End Footer -->

    <!-- Start Script -->
        @include('home.script')
    <!-- End Script -->
</body>

</html>