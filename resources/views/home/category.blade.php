<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Categories of The Month</h1>
            <p>
                Discover a wide range of top-quality products, from the latest technology and stylish fashion to home essentials and outdoor gear, all designed to meet your needs and enhance your lifestyle.
            </p>
        </div>
    </div>
    <div class="row">

        @foreach ($category as $item)
        
        <div class="col-12 col-md-4 p-5 mt-3">
            <form form action="{{url('user/search')}}" method="get">
                <input type="hidden" name="search" value="{{$item->category}}" >
                <button class="border-0 bg-transparent" style="outline: none; border-radius:50%;">
                    <img src='{{url("product/$item->image")}}' style="width: 344px; height:344px;" class="rounded-circle img-fluid border">
                </button>
                <h2 class="h5 text-center mt-3 mb-3">{{$item->category}}</h2>
            </form>
        </div>

        @endforeach

    </div>
</section>