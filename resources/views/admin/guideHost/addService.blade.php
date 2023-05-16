@extends('admin/layout')

@section('container')

    <div class="row"> 

        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Service</h4>
                    <p class="card-description">
                        Add Service
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

                    <form class="forms-sample" method="post" action="{{ url('add/service/process') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                        <label for="exampleInputName1">Service Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" placeholder="Service name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Place</label>
                            <select class="form-control" id="exampleSelectGender" name="placeId" required>
                            @foreach($places as $place)
                                <option value="{{ $place->id }}">{{ $place->name }}</option>
                            @endforeach
                            </select>
                        </div>


                        @if(Auth::user()->usertype==1)
                            <div class="form-group">
                            <label for="exampleInputName2">Hotel Name</label>
                            <input type="text" class="form-control" id="exampleInputName2" name="hotelName" placeholder="Hotel Name" required>
                            </div>

                            <div class="form-group">
                            <label for="exampleSelectGender">Room Type</label>
                            <select class="form-control" id="exampleSelectGender" name="roomType">
                            <option>AC</option>
                            <option>Non AC</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword4">Hotel Price</label>
                            <input type="number" class="form-control" id="exampleInputPassword4" name="hotelPrice" placeholder="Hotel Price" required>
                            </div>

                        @elseif(Auth::user()->usertype==2)
                        
                            <div class="form-group">
                            <label for="exampleInputPassword4">Room Price</label>
                            <input type="number" class="form-control" id="exampleInputPassword4" name="roomPrice" placeholder="Hotel Price" required>
                            </div>

                        @endif
                        <div class="form-group">
                        <label for="exampleInputPassword4">Food Item</label>
                        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Food Item" name="foodItem" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Food Price</label>
                            <input type="number" class="form-control" id="exampleInputPassword4" name="foodPrice" placeholder="Food Price" required>
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
                        <label for="exampleTextarea1">Feature</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="feature"></textarea>
                        </div>

                        @if(Auth::user()->usertype==1)

                            <div class="form-group">
                            <label for="exampleInputPassword4">Service Charge</label>
                            <input type="number" class="form-control" id="exampleInputPassword4" name="serviceCharge" placeholder="Service Charge" required>
                            </div>

                        @endif
                        
                        <div class="form-group">
                            <label for="exampleSelectGender">Service Available</label>
                            <select class="form-control" id="exampleSelectGender" name="available" required>
                            <option>Yes</option>
                            <option>No</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                    </div>
                </div>
                </div>
              

    </div>
    

@endsection()