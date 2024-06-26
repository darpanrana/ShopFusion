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

                            {{-- <div class="input-group">
                                <form class="d-flex pb-4" method="POST" action="{{url('admin/serach_product')}}">
                                    @csrf
                                    <input type="text" name="search" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31">
                                    <button class="btn btn-secondary"><i class="bx bx-search" ></i></button>
                                </form>
                            </div> --}}

                            <div class="card">
                                <h5 class="card-header">Orders</h5>
                                <div class="table-responsive text-nowrap">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Product Name</th>
                                        <th>Amount</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Invoice</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">

                                    @foreach ($order as $item)
                                    
                                    <tr>
                                        <td>
                                            {{$item->name}}
                                        </td>

                                        <td>
                                            {!!Str::limit($item->address,40)!!}
                                        </td>

                                        <td>
                                            {{$item->phone}}
                                        </td>
                                            
                                        <td>
                                            {{$item->product->title}}
                                        </td>
                                        <td>
                                            {{$item->product->price}}
                                        </td>
                                        <td>
                                            <img src='/product/{{$item->product->image}}' width="75" height="75" alt="" srcset="">
                                        </td>
                                        <td>
                                            @if ($item->status == 'In Progress')
                                                <span class="badge bg-danger">In Progress</span>   
                                            @elseif($item->status == 'On The Way')
                                                <span class="badge bg-warning">On The Way</span> 
                                            @else
                                                <span class="badge bg-success">Deliverd</span> 
                                            @endif
                                        </td>
                                        <td class="d-grid">
                                            <a class="btn btn-warning" href='{{url("admin/on_way/$item->id")}}'>On The Way</a> <br>
                                            <a class="btn btn-success" href='{{url("admin/deliverd/$item->id")}}'>Deliverd</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-secondary" href='{{url("bill/$item->id")}}'>Get PDF</a>
                                        </td>
                                    </tr>

                                    @endforeach
                                    
                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-center align-items-center">
                                    {{$order->links()}}
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{-- {{ $order->links() }} --}}
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
