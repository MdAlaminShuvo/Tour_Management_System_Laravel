@extends('admin/layout')

@section('container')



    <div class="row">

   

   
        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Booking List</h4>

                    @if(Session::has('wrong'))

                        <div class="alert alert-danger">

                            {{Session::get('wrong')}}


                        </div>

                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>
                                Transaction No
                            </th>
                            <th>
                                From
                            </th>
                            <th>
                                To
                            </th>
                          
                            <th>
                                Place
                            </th>
                                                  
                            <th>
                                Action
                            </th>
                            <th>
                                Pay to Guide-Host
                            </th>
                            
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($bookingLists as $bookingList)

                                <tr>

                                <td>

                                    {{ $bookingList->transaction_id }}

                                </td>

                                <td>

                                    {{ $bookingList->from_date }}

                                </td>

                                <td>

                                    {{ $bookingList->to_date }}

                                </td>

                                <td>

                                    {{ $bookingList->place->name }}

                                </td>
                                <td>

                                    <a class="btn btn-rounded btn-success" href="{{ url('booking-list/details/'. $bookingList->id) }}">Details</a>

                                </td>
                                <td>
                                @if($bookingList->guide_host_tranx_id==Null)

                                    <a class="btn btn-rounded btn-primary" href="{{ url('/pay/guide-host/'. $bookingList->id) }}">Pay Now</a>

                                @else

                                    Already Paid


                                @endif

                                </td>
                              


                                </tr>
                            
                             
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
        
    

     
    </div>

@endsection()