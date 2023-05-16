@extends('admin/layout')

@section('container')

    
    <h3 class="card-title">Service</h3>

    <br>

    <div class="row">

   

    @foreach($services as $service)

        <div class="col-md-4">

            <div class="card" style="width: 18rem;">
            @can('isLocalGuide')
            <img class="card-img-top" src="{{ asset('assets/lgHotelRoomImage/'.$service->room_picture) }}" style="width:80%;height:150px;" alt="Card image cap">
            @endcan
            @can('isLocalHost')
            <img class="card-img-top" src="{{ asset('assets/lhRoomImage/'.$service->room_picture) }}"  style="width:80%;height:150px" alt="Card image cap">
            @endcan
            <div class="card-body">
                <h5 class="card-title">{{ $service->service_name }}</h5>
                <p class="card-text">Total Price : {{ $service->total_price }}</p>
                <p class="card-text"> <i>Rating :</i> {{ $service->rating }}</p>
                @if($service->available == "Yes")

                    <p class="text-success card-text">Available</p>

                @else

                <p class="text-danger card-text">Not Available</p>

                @endif
                <br>
                <a href="{{ url('/service/view/'.$service->id) }}" class="btn btn-primary">View</a>
                <a href="{{ url('/service/edit/'.$service->id) }}" class="btn btn-success">Edit</a>
            </div>
            </div>

        </div>
    
    @endforeach

     
    </div>

@endsection()