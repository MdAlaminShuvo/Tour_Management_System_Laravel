@extends('admin/layout')

@section('container')

<div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                  @if(Auth::user()->status!="Pending")
                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! You are now interacted as a 
                  
                  @else

                    <h6 class="font-weight-normal mb-0">Please wait for the admin approval.Then you are interacted as a 
                  
                  @endif
          
                  @if(Auth::user()->usertype==1)
                  
                    <span class="text-primary">Local Guide</span></h6>

                  @elseif(Auth::user()->usertype==2)

                    <span class="text-primary">Local Host</span></h6>

                  @else
                  
                    <span class="text-primary">Super Admin</span></h6>
                  
                  @endif 
                 
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <p class="btn btn-sm btn-light bg-white" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="mdi mdi-calendar"></i> Today ({{ $today }})
                    </p>
                  
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="{{ asset('assets/admin/images/dashboard/people.svg') }}" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>{{ $weather->main->temp - 273 }} <sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">{{ $city }}</h4>
                        <h6 class="font-weight-normal">{{ $country }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total Earn (BDT)</p>
                      <p class="fs-30 mb-2">
                        {{ $totalEarn }}
                      </p>
                      <p></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Bookings</p>
                      <p class="fs-30 mb-2">{{ $totalBooking }}</p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Service</p>
                      <p class="fs-30 mb-2">{{ $totalService }}</p>
                      <p></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Pending Tours</p>
                      <p class="fs-30 mb-2">{{ $pendingTour }}</p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


@endsection()