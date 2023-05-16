@extends('admin/layout')

@section('container')



    <div class="row">

   

   
        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Return Booking List</h4>

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
                                Return Booking
                            </th>
                            
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($returnBookingLists as $returnBookingList)

                                <tr>

                                <td>

                                    {{ $returnBookingList->transaction_id }}

                                </td>

                                <td>

                                    {{ $returnBookingList->from_date }}

                                </td>

                                <td>

                                    {{ $returnBookingList->to_date }}

                                </td>

                                <td>

                                    {{ $returnBookingList->place->name }}

                                </td>
                                <td>

                                    <a class="btn btn-rounded btn-success" href="{{ url('return-booking-list/details/'. $returnBookingList->id) }}">Details</a>

                                </td>
                                <td>
                                @if($returnBookingList->return_tranx_id==Null)

                                    <a class="btn btn-rounded btn-primary" href="{{ url('/return/booking/process/'. $returnBookingList->id) }}">Return Now</a>

                                @else

                                    Already returned


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