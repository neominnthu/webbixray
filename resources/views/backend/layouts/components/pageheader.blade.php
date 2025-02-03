            <!--begin::Row-->
            <div class="row">

                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                  </ol>
                </div>
                <div class="col-sm-6">
                    @include('backend.layouts.components.alert')
                </div>
              </div>
              <!--end::Row-->
