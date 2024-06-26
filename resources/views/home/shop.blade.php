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

    <!-- Products -->

    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">

                    @foreach ($category as $item)
                        <li class="pb-3">
                            <form action='{{url("user/search")}}' method="get">
                                @csrf
                                <input type="hidden" name="search" value="{{$item->category_name}}">
                                <button class="collapsed border-0 bg-transparent cursor-pointer d-flex justify-content-between h3 text-decoration-none" style="outline:none;">
                                    {{$item->category_name}}
                                </button>
                            </form>
                        </li>
                    @endforeach
    
                </ul>
            </div>

            <div class="col-lg-9">

                <div class="row">

                    @foreach ($products as $data)

                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" style="height:304px; height:304px; " src='{{url("product/$data->image")}}'>
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href='{{url("user/product/$data->id")}}' class="h3 text-decoration-none">{{ $data->title }}</a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li></li>
                                        <li class="pt-2">
                                                <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                                <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                                <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                                <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                                <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex mb-1">
                                        <p>{!!Str::limit($data->description,30)!!}</p>
                                    </ul>
                                    <div class=" d-flex justify-content-between">
                                        <p class="text-center mb-0"> <i class="fa fa-rupee-sign" ></i> {{$data->price}}</p>
                                        <a href='{{url("user/add_cart/$data->id")}}'>
                                            <button class="btn btn-success" >Add To Cart</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    
                </div>
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </div>

    <!-- End Products -->

    <!-- Start Footer -->
    @include('home.footer')
    <!-- End Footer -->

    <!-- Start Script -->
        @include('home.script')
    <!-- End Script -->
</body>

</html>