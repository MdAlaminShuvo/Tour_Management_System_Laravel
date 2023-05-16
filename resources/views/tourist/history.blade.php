@extends('tourist/layout')

@section('container')

<link href="{{ asset('assets/css/styleHistory.css')}}" rel="stylesheet">

<br>

<center><h3>History</h3></center>

<br>

@if(Session::has('wrong'))

  <div class="alert alert-danger">

      {{Session::get('wrong')}}
      <a href="/user/profile" style="color:blue;">Update Profile</a>

  </div>

@endif

@if(Session::has('success'))

  <div class="alert alert-success">

      {{Session::get('success')}}


  </div>

@endif

<table>

  <thead>
    <tr>
      <th scope="col">Period</th>
      <th scope="col">Place</th>
      <th scope="col">Tran No</th>
      <th scope="col">Tour Status</th>
      <th scope="col">Payment Copy</th>
      <th scope="col">Virtual Assistant Service</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($histories as $history)
        <tr>

            <td scope="row" data-label="Period">{{ $history->from_date }} - {{ $history->to_date }}</td>
            <td data-label="Place">{{ $history->place->name }}</td>
            <td data-label="Tour Status">{{ $history->transaction_id }}</td>
            <td data-label="Transaction No">{{ $history->tour_status }}</td>
            <td data-label="Payment Copy"><a href="{{ url('/download/payment-copy/'.$history->id) }}" class="btn btn-success">Download</a></td>
            @if($history->package_id=='3' || $history->package_id=='4')
            
              <td data-label="Virtual Assistant Service"><a href="{{ url('/virtual-assistant/service/'.$history->transaction_id) }}"  target="_blank" class="btn btn-dark">Get App</a></td>
            
            @else

              <td data-label="Virtual Assistant Service">Not Available</td>  
            
            @endif

            @php

              $returnLastDate=date('Y-m-d', strtotime($history->from_date. ' - 1 days'));

            @endphp

            @if($today<$returnLastDate && $history->tour_status!="Cancel")

              <td data-label="Action"><a href="{{ url('return/booking/'.$history->id) }}" class="btn btn-danger">Return Booking</a></td>

            @else

              <td data-label="Action">Not Available</td>

            @endif

        </tr>
    @endforeach
 
  </tbody>

 

</table>

<br>

<div class="float-right">  {{ $histories->links() }} </div>

@endsection()

