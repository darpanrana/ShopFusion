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

    <!-- Content -->

    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src='{{url("product/$product->image") }}' alt="Card image cap" id="product-detail">
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{ $product->title }}</h1>
                            <p class="h3 py-2"> <i class="fa fa-rupee-sign"></i> {{ $product->price }}</p>

                            <h6>Category :</h6>
                            <p>{{ $product->category }}</p>

                            <h6>Description:</h6>
                            <p>{{ $product->description }}</p>
                            
                            <form action="" method="GET">

                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <a class="btn btn-success btn-lg" href='{{url("user/add_cart/$product->id")}}'>
                                            Add To Cart
                                        </a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End Content -->

    <!-- Start Footer -->
        @include('home.footer')
    <!-- End Footer -->

    <!-- Start Script -->
        @include('home.script')
    <!-- End Script -->
</body>

</html>