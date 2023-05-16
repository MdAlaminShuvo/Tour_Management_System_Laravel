@extends('admin/layout')

@section('container')



    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Review List</h4>
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
                                Customer Name
                            </th>
                            <th>
                                Customer Email
                            </th>
                                                  
                            <th>
                                Comment
                            </th>
                            <th>
                                Rating
                            </th>
                            <th>
                                Date
                            </th>
                            
                            </tr>
                        </thead>
                        <tbody>

                           

                                @foreach($reviews as $review)

                                    @if($review!=null)

                                        <tr>

                                        

                                        <td>

                                            {{ $review->order->from_date }}

                                        </td>

                                        

                                        <td>

                                            {{ $review->order->to_date }}
                                        
                                        </td>

                                        <td>

                                            {{ $review->order->place->name }}
                                            
                                        </td>
                                        <td>

                                            {{ $review->order->name }}

                                        </td>
                                        <td>

                                            {{ $review->order->email }}


                                        </td>
                                        <td>

                                            {{ $review->comment }}

                                        </td>
                                        <td>

                                            {{ $review->rating }}

                                        </td>
                                        <td>

                                            {{ $review->date }}

                                        </td>


                                    
                                    

                                        </tr>    
                                        
                                    @endif
                                
                                @endforeach


                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
        
    

     
    </div>

@endsection()