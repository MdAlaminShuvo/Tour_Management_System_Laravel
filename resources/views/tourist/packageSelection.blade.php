@extends('tourist/layout')

@section('container')


     <!-- Package Start -->
     <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Best Affordable Package</h6>
                <h1>Select your package</h1>
            </div>
            <div class="row">
                <div class="card packageCard" style="margin-left:13px;margin-top:10px;border: 2px solid gray;">
                    <div class="card-header font-weight-bold">
                        Regular Package
                    </div>
                    <ul class="list-group list-group-flush">
                        <br>
                        <li class="list-group-item"><i class="fa fa-check text-primary mr-3"></i>Local Guide</li>
                        <li class="list-group-item">&emsp;&emsp;Local Host</li>
                        <li class="list-group-item">&emsp;&emsp;Virtual Assistant</li>
                        <br>
                        <hr>
                        <a href="{{ url('place/'.$placeId.'/package/1') }}" class="btn btn-success">Get Started</a>

                    </ul>

              
                </div>
                <div class="card packageCard" style="margin-left:13px;margin-top:10px;border: 2px solid gray;">
                    <div class="card-header font-weight-bold">
                        Premium Package
                    </div>
                    <ul class="list-group list-group-flush">
                        <br>
                        <li class="list-group-item"></i>&emsp;&emsp;Local Guide</li>
                        <li class="list-group-item"><i class="fa fa-check text-primary mr-3"></i>Local Host</li>
                        <li class="list-group-item">&emsp;&emsp;Virtual Assistant</li>
                        <br>
                        <hr>
                        <a href="{{ url('place/'.$placeId.'/package/2') }}" class="btn btn-success">Get Started</a>


                    </ul>
                </div>
                <div class="card packageCard" style="margin-left:13px;margin-top:10px;border: 2px solid gray;">
                    <div class="card-header font-weight-bold">
                        Pro Package
                    </div>
                    <ul class="list-group list-group-flush">
                        <br>
                        <li class="list-group-item">&emsp;&emsp;Local Guide</li>
                        <li class="list-group-item"><i class="fa fa-check text-primary mr-3"></i>Local Host</li>
                        <li class="list-group-item"><i class="fa fa-check text-primary mr-3"></i>Virtual Assistant</li>
                        <br>
                        <hr>
                        <a href="{{ url('place/'.$placeId.'/package/3') }}" class="btn btn-success">Get Started</a>

                    </ul>
                </div>
                <div class="card packageCard" style="margin-left:13px;margin-top:10px;border: 2px solid gray;">
                    <div class="card-header font-weight-bold">
                        Ultra Pro Package
                    </div>
                    <ul class="list-group list-group-flush">
                        <br>
                        <li class="list-group-item"><i class="fa fa-check text-primary mr-3"></i>Local Guide</li>
                        <li class="list-group-item">&emsp;&emsp;Local Host</li>
                        <li class="list-group-item"><i class="fa fa-check text-primary mr-3"></i>Virtual Assistant</li>
                        <br>
                        <hr>
                        <a href="{{ url('place/'.$placeId.'/package/4') }}" class="btn btn-success">Get Started</a>

                    </ul>
                </div>
             
               
            </div>
        </div>
    </div>
    <!-- Package End -->

@endsection()