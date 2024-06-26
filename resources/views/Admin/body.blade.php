<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-12">
        <div class="row">

          <div class="col-lg-3 col-md-12 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <i class="bx bx-user fs-xlarge border-solid p-2 bg-success text-white rounded"></i>
                  </div>
                </div>
                <span class="fw-medium d-block mb-1">Users</span>
                <h3 class="card-title mb-2">{{ $user }}</h3>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-12 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <i class="bx bx-package fs-xlarge border-solid p-2 bg-warning text-white rounded" ></i>
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt6"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                      <a class="dropdown-item" href="{{url('admin/view_product')}}">View More</a>
                    </div>
                  </div>
                </div>
                <span class="fw-medium d-block mb-1">Products</span>
                <h3 class="card-title mb-2">{{ $product }}</h3>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-12 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <i class="bx bx-cabinet fs-xlarge border-solid p-2 bg-info text-white rounded" ></i>
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt4"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                      <a class="dropdown-item" href="{{ url('admin/view_order') }}">View More</a>
                    </div>
                  </div>
                </div>
                <span class="d-block mb-1">Orders</span>
                <h3 class="card-title text-nowrap mb-2">{{ $order }}</h3>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-12 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <i class="bx bxs-truck fs-xlarge border-solid p-2 bg-secondary text-white rounded" ></i>
                  </div>
                </div>
                <span class="fw-medium d-block mb-1">Delivered</span>
                <h3 class="card-title mb-2">{{ $deliver }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>