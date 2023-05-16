@extends('admin/layout')

@section('container')

    
    <h3 class="card-title">Banner List</h3>

    <br>

    @if(Session::has('success'))

        <div class="alert alert-success">

            {{Session::get('success')}}


        </div>

    @endif


    <div class="row">

    @foreach($banners as $banner)

        <div class="col-md-4">

            <div class="card" style="width: 18rem;">

            <img class="card-img-top" src="{{ asset('assets/banner/'.$banner->image) }}" alt="Card image cap">

            <div class="card-body">
                <h5 class="card-title">Title : {{ $banner->title }}</h5>
                <p class="card-text">Subtitle : {{ $banner->subtitle }}</p>
               
                <br>

                <a href="{{ url('banner/delete/'.$banner->id) }}" class="btn btn-danger">Delete</a>

            </div>
            </div>

        </div>
    
    @endforeach

     
    </div>

@endsection()