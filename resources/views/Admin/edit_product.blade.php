<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    @include('Admin.css')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <!-- Menu -->
          @include('Admin.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Navbar -->
            @include('Admin.navbar')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">

            <!-- Content -->

            <div class="container">
                <div class="row d-flex justify-content-center pt-5">
                    <div class="col-5">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Add Category</h5>  
                            </div>
                            <div class="card-body">

                                <form action="{{url('admin/update_product',$product->id)}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Product Title</label>
                                    <input type="text" value="{{$product->title}}" name="product_title" class="form-control" id="basic-default-fullname" placeholder="Enter Product Title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Product Description</label>
                                    <textarea name="product_desc" class="form-control" id="basic-default-fullname" placeholder="Enter Product Description">{{$product->description}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Product Category</label>
                                    <select id="defaultSelect" name="product_category" class="form-select">                                      
                                        <option value="{{$product->category}}">{{$product->category}}</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Product Image</label><br>
                                    <img src='{{url("product/$product->image")}}' width="100" height="100" alt="" srcset="">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Product Image Update</label>
                                    <input type="file" name="product_img" class="form-control" id="basic-default-fullname">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Product Price</label>
                                    <input type="text" value="{{$product->price}}" name="product_price" class="form-control" id="basic-default-fullname" placeholder="Enter Product Price">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Product Quantity</label>
                                    <input type="number" value="{{$product->quantity}}" name="product_quantity" class="form-control" id="basic-default-fullname" placeholder="Enter Product Quantity">
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- script -->
        <script>

            function confirmartion(ev) 
            {
                ev.preventDefault();
                var url = ev.currentTarget.getAttribute('href');
                console.log(url);

                swal({
                    title : "Are You Sure Want To Delete This..?",
                    text : "This Delete Will Be Parmanent",
                    icon : "warning" ,
                    buttons : true,
                    dangerMode : true,
                })

                .then((willCancel)=>{
                    if(willCancel)
                    {
                        window.location.href = url;
                    }
                });
            }

        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @include('Admin.script')
    <!--/ script -->

  </body>
</html>
