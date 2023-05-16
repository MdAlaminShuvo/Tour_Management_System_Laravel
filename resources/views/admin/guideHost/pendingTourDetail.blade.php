@extends('admin/layout')

@section('container')

    <div class="row"> 

        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Pending Tour Details</h4>
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

                        <div class="form-group">
                        <label for="exampleInputName1">Service Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $serviceInformation->service_name }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Package Name</label>

                        <?php

                            if($tourInformation->package_id==1)

                                $packageName="Regular Package";

                            else if($tourInformation->package_id==2)

                                $packageName="Premium Package";
                            
                            else if($tourInformation->package_id==3)

                                $packageName="Pro Package";

                            else

                                $packageName="Ultrapro Package";

                        ?>

                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $packageName }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Customer Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $userInformation->name }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Customer Email</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $tourInformation->email }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Customer Phone</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $tourInformation->phone }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">From</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $tourInformation->from_date }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">To</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $tourInformation->to_date }}" readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Amount of Person</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceName" value="{{ $tourInformation->amount_of_person }}" readonly>
                        </div>

                    </div>
                </div>
                </div>
              

    </div>
    

@endsection()