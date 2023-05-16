@extends('tourist/layout')

@section('container')



    <!-- Packages Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Local Guides</h6>
                <h1>Select Local Guide</h1>
            </div>
            <div class="row">
                @foreach($localGuides as $guide)

                    @foreach($guide->local_guide_services as $service)

                        @if($service->place_id==$placeId)

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="package-item bg-white mb-2">
                                <img class="img-fluid" src="{{ asset('assets/lgHotelRoomImage/'.$service->room_picture) }}" style="height:200px;width:400px;" alt="">
                                <div class="p-4">
                                    <div class="d-flex justify-content-between mb-3">
                                        <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{ $place->name }}</small>
                                        <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>Per days</small>
                                        <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>Per Person</small>
                                    </div>

                                    <br>


                                    <a class="h5 text-decoration-none"  href="">{{  $service->service_name }}</a>
                                    <p style="margin-top:0.5px;"></p>
                                  
                                    <i>offered by</i>
                                    <p style="margin-top:0.1px;"></p>
                                    <img width="40px;" style="border-radius:50%;" src="{{ $guide->profile_photo_url }}">  {{ $guide->name }}
                                    <div class="border-top mt-4 pt-4">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>{{ $service->rating }} <small></small></h6>
                                            <h5 class="m-0">৳{{ $service->total_price +  $virtualAssistantPrice }}</h5>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="m-0"><small></small></h6>
                                            
                                            
                                            @if($service->available=="Yes")

                                                <a href="{{ url('/place/'.$placeId.'/ultrapro-package/'.$packageId.'/guide-service/'.$service->id) }}" class="btn btn-success ">Details</a>


                                            @else

                                                <button class="btn btn-danger ">Not Available</button>



                                            @endif




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    @endforeach

                @endforeach
              
            </div>
        </div>
    </div>
    <!-- Packages End -->

@endsection()
