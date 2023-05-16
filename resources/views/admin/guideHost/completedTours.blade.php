@extends('admin/layout')

@section('container')



    <div class="row">

   

   
        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Completed Tours</h4>
                    <p class="card-description">


                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
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
                            
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($completedTours as $completedTour)

                                <tr>

                                <td>

                                    {{ $completedTour->from_date }}

                                </td>

                                <td>

                                    {{ $completedTour->to_date }}

                                </td>

                                <td>

                                    {{ $completedTour->place->name }}

                                </td>
                                <td>

                                    <a class="btn btn-rounded btn-success" href="{{ url('completedTour/details/'. $completedTour->id) }}">Details</a>

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