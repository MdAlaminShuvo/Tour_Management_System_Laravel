@extends('admin/layout')

@section('container')

    <div class="row"> 

        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Pending Guide Host Details</h4>

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

                        <img src="{{ $userDetails->profile_photo_url }}" style="border-radius:50%; width:100px;height:100px;" alt="image"/>

                        <br>
                        <br>

                        <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $userDetails->name }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $userDetails->email }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Phone</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $userDetails->phone }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Address</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $userDetails->email }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">NID</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $userDetails->nid }}" readonly>
                        </div>


                        <div class="form-group">
                        <label for="exampleInputName1">Date of Birth</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $userDetails->date_of_birth }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Bank Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $userDetails->bank_name }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Account No</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $userDetails->account_no }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Registration Date & Time</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $userDetails->created_at }}" readonly>
                        </div>

                    </div>
                </div>
                </div>
              

    </div>
    

@endsection()