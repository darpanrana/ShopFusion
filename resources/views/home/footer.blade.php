<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">

        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">ShopFusion</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        Lorem ipsum dolor sit amet elit.
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:01234567890">01234567890</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:shopfusion@info.com">shopfusion@info.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    @foreach ($categorys as $item)
                        <li>
                            <form action='{{url("user/search")}}' method="get">
                                @csrf
                                <input type="hidden" name="search" value="{{$item->category_name}}">
                                <button class="collapsed p-0 text-white fw-lighter border-0 bg-transparent cursor-pointer d-flex justify-content-between text-decoration-none style-btn" style="outline:none;">
                                    {{$item->category_name}}
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="{{ url('/') }}">Home</a></li>
                    <li><a class="text-decoration-none" href="{{ url('/user/about_us') }}">About Us</a></li>
                    <li><a class="text-decoration-none" href="{{ url('/user/shop') }}">Explore</a></li>
                    <li><a class="text-decoration-none" href="{{ url('/user/my_order') }}">My Orders</a></li>
                    <li><a class="text-decoration-none" href="{{ url('user/contact') }}">Shop Locations</a></li>
                </ul>
            </div>

        </div>

        <div class="row text-light">

            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
            <div class="col-auto me-auto">
                <ul class="list-inline text-left footer-icons">
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <div class="input-group mb-2">
                </div>
            </div>

        </div>

    </div>
</footer>