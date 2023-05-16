@extends('admin/layout')

@section('container')

    <div class="row"> 

        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Service Edit</h4>
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

                    <form class="forms-sample" method="post" action="{{ url('service/update',$service->id) }}" enctype="multipart/form-data">

                        @csrf

                     @can('isLocalGuide')

                        <div class="row">

                            <div class="card col-sm-6" style="width: 18rem;">
                                <img class="card-img-top" style="width:80%;height:180px;" src="{{ asset('assets/lgHotelRoomImage/'.$service->room_picture)  }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Hotel Room Image</h5>
                                </div>
                            </div>

                            <div class="card col-sm-6" style="width: 18rem;">
                                <img class="card-img-top" style="width:80%;height:180px;" src="{{ asset('assets/lgFoodImage/'.$service->food_picture)  }}" alt="Card image cap">
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
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $service->service_name }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleSelectGender">Service Available</label>
                            <select class="form-control" id="exampleSelectGender" name="available" required>
                            <option <?php if($service->available=="Yes") echo"selected"; ?>>Yes</option>
                            <option <?php if($service->available=="No") echo"selected"; ?>>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Place</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{ $service->place->name }}" readonly>
                        </div>

                       <div class="form-group">
                       <label>Room Image</label>
                       <input type="file" class="file-upload-default" name="roomImage">
                       <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" required>
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                       </div>
                       </div>
                        
                        <div class="form-group">
                        <label>Food Image</label>
                        <input type="file" class="file-upload-default" name="foodImage">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" required>
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Feature</label>

                        <textarea class="form-control" name="feature" id="" cols="20" rows="5">{{ $service->feature }}</textarea>

                        </div>

                        @can('isLocalGuide')

                            <div class="form-group">
                            <label for="exampleInputName1">Hotel Name</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="hotelName" value="{{ $service->hotel_name }}">
                            </div>

                            <div class="form-group">
                            <label for="exampleInputName1">Room Type</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="roomType" value="{{ $service->room_type }}">
                            </div>

                            <div class="form-group">
                            <label for="exampleInputName1">Service Charge</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="serviceCharge" value="{{ $service->service_charge }}">
                            </div>

                            <div class="form-group">
                            <label for="exampleInputName1">Hotel Price</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="hotelPrice" value="{{ $service->hotel_price }}">
                            </div>

                        @endcan

                        @can('isLocalHost')
                            
                            <div class="form-group">
                            <label for="exampleInputName1">Room Price</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="roomPrice" value="{{ $service->room_price }}">
                            </div>

                        @endcan

                        <div class="form-group">
                        <label for="exampleInputName1">Food Item</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="foodItem" value="{{ $service->food_item }}">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Food Price</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="foodPrice" value="{{ $service->food_price }}">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Total Price</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="totalPrice" value="{{ $service->total_price }}" readonly>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Update</button>

                        </form>

                    </div>

                   

                </div>
                </div>
              

    </div>
    

@endsection()