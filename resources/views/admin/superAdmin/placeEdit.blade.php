@extends('admin/layout')

@section('container')

    <div class="row"> 

        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Place Edit</h4>
                    
                    <p class="card-description">

                    </p>

                    <div class="card" style="width: 18rem;">
                                <img class="card-img-top" style="width:80%;height:60%;" src="{{ asset('assets/placeImage/'.$placeDetails->photo)  }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Place Image</h5>
                                </div>
                    </div>

                    
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

                        <form action="{{ url('place/update/'.$placeDetails->id ) }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{ $placeDetails->name }}" required>
                            </div>

                            <div class="form-group">
                            <label for="exampleInputName1">Address</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="address" value="{{ $placeDetails->address }}" required>
                            </div>

                            <div class="form-group">
                            <label>Place Image</label>
                            <input type="file" class="file-upload-default" name="placeImage">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" required>
                                <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Update</button>

                        </form>

                    </div>
                </div>
                </div>
              

    </div>
    

@endsection()