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
                    <div class="row d-flex justify-content-center">
                        <div class="col-12">

                            <div class="input-group">
                                <form class="d-flex pb-4" method="POST" action="{{url('admin/serach_product')}}">
                                    @csrf
                                    <input type="text" name="search" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31">
                                    <button class="btn btn-secondary"><i class="bx bx-search" ></i></button>
                                </form>
                            </div>

                            <div class="card">
                                <h5 class="card-header">Products</h5>
                                <div class="table-responsive text-nowrap">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Image</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">

                                    @foreach ($products as $item)
                                    
                                    <tr>
                                        <td>
                                            {{$item->title}}
                                        </td>

                                        <td>
                                            {!!Str::limit($item->description,40)!!}
                                        </td>

                                        <td>
                                            {{$item->category}}
                                        </td>
                                            
                                        <td>
                                            {{$item->price}}
                                        </td>
                                        <td>
                                            {{$item->quantity}}
                                        </td>
                                        <td>
                                            <img src='{{url("product/$item->image")}}' width="100" height="100" alt="" srcset="">
                                        </td>
                                        <td>
                                            <a href="{{url('admin/edit_product',$item->id)}}" class="btn btn-success">Update</a>
                                        </td>
                                        <td>
                                            <a href="{{url('admin/delete_product',$item->id)}}" onclick="confirmartion(event)" class="btn btn-danger">Delete</a>
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
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
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
