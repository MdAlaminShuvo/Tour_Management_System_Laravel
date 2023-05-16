@extends('tourist/layout')

@section('container')

    
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
           
            <div class="carousel-inner">

                @foreach($banners as $banner)

                    @if($loop->first)

                        <div class="carousel-item active">
                            <img class="w-100" src="{{ asset('assets/banner/'.$banner->image) }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 900px;">
                                <h4 class="text-white text-uppercase mb-md-3">{{ $banner->title }}</h4>
                                    <h1 class="display-3 text-white mb-md-4">{{ $banner->subtitle }}</h1>
                                    <a href="#place" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                                </div>
                            </div>
                        </div>

                    @else

                        <div class="carousel-item">
                                <img class="w-100" src="{{ asset('assets/banner/'.$banner->image) }}" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase mb-md-3">{{ $banner->title }}</h4>
                                        <h1 class="display-3 text-white mb-md-4">{{ $banner->subtitle }}</h1>
                                        <a href="#place" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                                    </div>
                                </div>
                        </div>

                    @endif

                @endforeach
              
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    
    <!-- About Start -->
    <div class="container-fluid py-5"   id="about">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset('assets/img/tourist.jpg') }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h6>
                        <h1 class="mb-3">We Provide Best Tour Packages In Your Budget</h1>
                        <p>Our system is an end to end complete software solution which will  help the tourists to provide service manager,booking pricing and other inventory</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="{{ asset('assets/img/about-1.jpg') }}" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="{{ asset('assets/img/about-3.jpg') }}" alt="">
                            </div>
                        </div>
                        <a href="#place" class="btn btn-primary mt-1">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    
    <!-- Service Start -->
    <div class="container-fluid py-5" id="service">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Services</h6>
                <h1>Tours & Hospitality Services</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                        <h5 class="mb-2">Local Guide</h5>
                        <p class="m-0">Guide the tourist physically.Tourist can hire local guide based on tourist budget and guide’s rating</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-home mx-auto mb-4"></i>
                        <h5 class="mb-2">Local Host</h5>
                        <p class="m-0">Stay in local house by local host.So,tourist can take an Advanture feel</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-robot mx-auto mb-4"></i>
                        <h5 class="mb-2">Virtual Assistant</h5>
                        <p class="m-0">Guide the tourist virtually.Find out tourist location,translate language by virtual assistant</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

     <!-- Place Start -->
     <div class="container-fluid py-5" id="place">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Top Trending Place</h6>
                <h1>Recommended Place</h1>
            </div>
            <div class="row">

                @foreach($places as $place)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="{{ asset('assets/placeImage/'.$place->photo) }}" style="height:200px;width:400px;" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{ $place->address }}</small>
                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>Per day</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>Per Person</small>
                            </div>
                            <a class="h5 text-decoration-none" href="">{{ $place->name }}</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><small></small></h6>
                                    <h5  class="m-0"><a href="{{ url('/place/'.$place->id) }}" class="btn btn-success ">Place Order</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
   
            </div>
        </div>
    </div>
    <!-- Place End -->

    
    <!-- Contact Start -->
    <div class="container-fluid bg-registration py-5" style="margin: 90px 0;" id="contact">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">

                    <div class="mb-4">
                        <h1 class="text-white"><span class="text-primary">Tourist </span> Helpline</h1>
                    </div>
          
                    <ul class="list-inline text-white m-0">
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Email : ghurtejabo@gmail.com</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Phone : 01824072334</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Address : Rajshahi,Bangladesh</li>

                    </ul>
                    
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-primary text-center p-4">
                            <h1 class="text-white m-0">Contact</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-white p-5">
                            <form method="post" action="/contact/send-message">

                                @csrf

                                @if(Session::has('successSendMessage'))

                                <p style="text-align:center; color:green;">

                                    {{Session::get('successSendMessage')}}


                                </p>
                                @endif
                                

                                <div class="form-group">
                                    <input type="text" name="name" class="form-control p-4" placeholder="Your name" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control p-4" placeholder="Your email" required="required" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="textAreaExample1" rows="4" placeholder="   Message"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block py-3" type="submit">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->



@endsection()