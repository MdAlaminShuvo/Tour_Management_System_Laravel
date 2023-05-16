@extends('admin/layout')

@section('container')

    <div class="row"> 

        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Service Details</h4>
                    <p class="card-description">

                    </p>
                    
                    @if(Session::has('wrongInformation'))

                        <div class="alert alert-danger">

                            {{Session::get('wrongInformation')}}


                        </div>

                    @endif

                    @if(Session::has('success'))

                        <div class="alert alert-success">

                            {{Session::get('success')}}


                        </div>

                     @endif

                     @can('isLocalGuide')

                        <div class="row">

                            <div class="card col-sm-6" style="width: 18rem;">
                                <img class="card-img-top" style="width:80%;height:60%;" src="{{ asset('assets/lgHotelRoomImage/'.$service->room_picture)  }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Hotel Room Image</h5>
                                </div>
                            </div>

                            <div class="card col-sm-6" style="width: 18rem;">
                                <img class="card-img-top" style="width:80%;height:60%;" src="{{ asset('assets/lgFoodImage/'.$service->food_picture)  }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Food Image</h5>
                                </div>
                            </div>


                        </div>

                    @endcan

                    @can('isLocalHost')

                        <div class="row">

                            <div class="card col-sm-6" style="width: 18rem;">
                                <img class="card-img-top" style="width:80%;height:180px;" src="{{ asset('assets/lhRoomImage/'.$service->room_picture)  }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Room Image</h5>
                                </div>
                            </div>

                            <div class="card col-sm-6" style="width: 18rem;">
                                <img class="card-img-top" style="width:80%;height:180px;" src="{{ asset('assets/lhFoodImage/'.$service->food_picture)  }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Food Image</h5>
                                </div>
                            </div>


                        </div>

                    @endcan

                        <div class="form-group">
                        <label for="exampleInputName1">Service Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $service->service_name }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Available</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $service->available }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Place</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $service->place->name }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Feature</label>

                        <textarea class="form-control" name="" id="" cols="20" rows="5" readonly>{{ $service->feature }}</textarea>

                        </div>

                        @can('isLocalGuide')

                            <div class="form-group">
                            <label for="exampleInputName1">Hotel Name</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $service->hotel_name }}" readonly>
                            </div>

                            <div class="form-group">
                            <label for="exampleInputName1">Room Type</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $service->room_type }}" readonly>
                            </div>

                            <div class="form-group">
                            <label for="exampleInputName1">Service Charge</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $service->service_charge }}" readonly>
                            </div>

                            <div class="form-group">
                            <label for="exampleInputName1">Hotel Price</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $service->hotel_price }}" readonly>
                            </div>

                        @endcan

                        @can('isLocalHost')
                            
                            <div class="form-group">
                            <label for="exampleInputName1">Room Price</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $service->room_price }}" readonly>
                            </div>

                        @endcan

                        <div class="form-group">
                        <label for="exampleInputName1">Food Item</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $service->food_item }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Food Price</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $service->food_price }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Total Price</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $service->total_price }}" readonly>
                        </div>

                    </div>
                </div>
                </div>
              

    </div>
    

@endsection()