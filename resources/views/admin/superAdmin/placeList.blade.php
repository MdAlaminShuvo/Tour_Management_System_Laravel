@extends('admin/layout')

@section('container')

    
    <h3 class="card-title">Place</h3>

    <br>

    <div class="row">

   

    @foreach($places as $place)

        <div class="col-md-4">

            <div class="card" style="width: 18rem;">

            <img class="card-img-top" src="{{ asset('assets/placeImage/'.$place->photo) }}" alt="Card image cap">

            <div class="card-body">
                <h5 class="card-title">{{ $place->name }}</h5>
                <p class="card-text">Address : {{ $place->address }}</p>
               
                <br>

                <a href="{{ url('place/edit/'.$place->id) }}" class="btn btn-success">Edit</a>

            </div>
            </div>

        </div>
    
    @endforeach

     
    </div>

@endsection()