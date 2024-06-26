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

    <!-- Start Banner Hero -->
        @include('home.slider')
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
        @include('home.category')
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
        @include('home.featured')
    <!-- End Featured Product -->


    <!-- Start Footer -->
        @include('home.footer')
    <!-- End Footer -->

    <!-- Start Script -->
        @include('home.script')
    <!-- End Script -->
</body>

</html>