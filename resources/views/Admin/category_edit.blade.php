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

                            <form action="{{url('category_update',$data->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Update Category</label>
                                <input type="text" name="category" class="form-control" id="basic-default-fullname" value="{{$data->category_name}}" placeholder="Enter Category">
                            </div>
                            
                            <button type="submit" class="btn btn-success">Update</button>
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
