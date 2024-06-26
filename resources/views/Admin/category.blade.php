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

                            <form action="{{url('admin/add_category')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Enter Category</label>
                                <input type="text" name="category" class="form-control" id="basic-default-fullname" placeholder="Enter Category">
                            </div>
                            
                            <button type="submit" class="btn btn-success">Submit</button>
                            </form>

                        </div>

                        </div>
                    </div>
                    
                    <div class="row d-flex justify-content-center pt-5">
                        <div class="col-5">
                            <div class="card">
                                <h5 class="card-header">Categories</h5>
                                <div class="table-responsive text-nowrap">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">

                                    @foreach ($categories as $item)
                                    
                                    <tr>
                                        <td>
                                            {{$item->category_name}}
                                        </td>

                                        <td>
                                            <a href="{{url('category_edit',$item->id)}}" class="btn btn-success">Edit</a>
                                        </td>

                                        <td>
                                            <a href="{{url('category_delete',$item->id)}}" onclick="confirmartion(event)" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>

                                    @endforeach
                                    
                                    </tbody>
                                </table>
                                </div>
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
