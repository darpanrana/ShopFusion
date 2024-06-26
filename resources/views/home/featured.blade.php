<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Featured Product</h1>
                <p>
                    Discover our featured products, showcasing top-rated items that combine innovation, quality, and style to enhance your lifestyle and meet your diverse needs.
                </p>
            </div>
        </div>
        <div class="row">

            @foreach ($featured as $featured)

                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href='{{url("user/product/$featured->id")}}'>
                            <img src='{{url("product/$featured->image")}}' style="width:414px; height:414px;" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-right"><i class="fa fa-rupee-sign"></i>{{$featured->price}}</li>
                            </ul>
                            <a href='{{url("user/product/$featured->id")}}' class="h2 text-decoration-none text-dark">{{$featured->title}}</a>
                            <p class="card-text">
                                {{$featured->description}}
                            </p>
                        </div>
                    </div>
                </div>

            @endforeach
            
        </div>
    </div>
</section>