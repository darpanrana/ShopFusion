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

        <div class="container pt-5 pb-5">
          <div class="row">
            <!-- cart -->
            <div class="col-lg-6">
              <div class="card border shadow-0">
                <div class="m-4">
                  <h4 class="card-title mb-4">Your shopping cart</h4>

                  @if ($cart_order == 0)
                      Cart Is Empty!
                  @endif

                @php
                    $value = 0; 
                @endphp
              
                @foreach ($cart as $item)

                <div class="row gy-3 mb-4">
                    <div class="col-lg-7">
                      <div class="me-lg-5">
                        <div class="d-flex">
                          <img src='/product/{{$item->product->image}}' class="border rounded me-3" style="width: 96px; height: 96px;" />
                          <div>
                            <a href="/user/product/{{$item->product->id}}" class="nav-link">{{ $item->product->title }}</a>
                            <p class="text-muted">{!!Str::limit($item->product->description,10) !!}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                      <div class="">
                        <text class="h6"> <i class="fa fa-rupee-sign" ></i> {{ $item->product->price }}</text> <br /> 
                      </div>
                    </div>
                    <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                      <div class="float-md-end">
                        <a href='{{url("user/remove_cart/$item->id")}}' class="btn btn-light border text-danger icon-hover-danger">Remove</a>
                      </div>
                    </div>
                </div>

                @php
                    $value = $value + $item->product->price;
                @endphp 

                @endforeach

                </div>
      
                <div class="border-top pt-4 mx-4 mb-4">
                  <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
                  <p class="text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip
                  </p>
                </div>
              </div>
            </div>
            <!-- cart -->

            <!-- summary -->
            <div class="col-lg-3">
                <div class="card shadow-0 border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Total price:</p>
                            <p class="mb-2">
                                <i class="fa fa-rupee-sign"></i>
                                @php
                                    echo $value;
                                    $tax = $value * 0.1;
                                @endphp
                            </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">TAX:</p>
                            <p class="mb-2">
                                <i class="fa fa-rupee-sign"></i>
                                @php
                                    echo $tax;
                                    $total = $value + $tax;
                                @endphp
                            </p>
                        </div>
                        <hr />
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Total price:</p>
                            <p class="mb-2 fw-bold">
                                <i class="fa fa-rupee-sign" ></i>
                                @php
                                    echo $total;
                                @endphp
                            </p>
                        </div>
        
                        <div class="mt-3">
                            <a href="{{url('user/shop')}}" class="btn btn-light w-100 border mt-2"> Back to shop </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- summary -->

            <!-- Order -->
            <div class="col-lg-3">
                <div class="card shadow-0 border">  
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>

                        <form action="{{url('user/order')}}" method="post">
                          @csrf
                          <div class="mb-3">
                              <label for="inputname">Name</label>
                              <input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name" placeholder="Enter Name">
                              <span class="text-danger">
                                @error('name')
                                    {{$message}}
                                @enderror
                              </span>
                          </div>

                          <div class="mb-3">
                              <label for="inputname">Address</label>
                              <textarea name="address" placeholder="Enter Address" class="form-control" id="" cols="30" rows="4">{{ $user->address }}</textarea>
                              <span class="text-danger">
                                @error('address')
                                    {{$message}}
                                @enderror
                              </span>
                          </div>

                          <div class="mb-3">
                              <label for="inputname">Phone</label>
                              <input type="text" value="{{ $user->phone }}" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
                              <span class="text-danger">
                                @error('phone')
                                    {{$message}}
                                @enderror
                              </span>
                          </div>

                          @if ($cart_order == 0)
                          
                          @else
                          
                            <div class="mb-3">
                                <button class="btn btn-success w-100 shadow-0 mb-2"> Cash On Delivery </button>
                            </div>

                            <div class="mb-3">
                              <a href="{{url('stripe',$total)}}" class="btn btn-success w-100 shadow-0 mb-2"> Pay Now </a>
                            </div>

                          @endif

                        </form>

                    </div> 
                </div>
            </div>

            <!-- End Order -->

          </div>
        </div>
    <!-- End Content -->

    <!-- Start Footer -->
    @include('home.footer')
    <!-- End Footer -->

    <!-- Start Script -->
        @include('home.script')
    <!-- End Script -->
</body>

</html>