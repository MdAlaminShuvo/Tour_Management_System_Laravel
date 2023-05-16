@extends('admin/layout')

@section('container')



    <div class="row">

   

   
        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Local Guide</h4>
                    <p class="card-description">


                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>
                                User
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Action
                            </th>
                          
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($guides as $guide)

                                <tr>
                                <td class="py-1">
                                    <img src="{{ $guide->profile_photo_url }}" alt="image"/>
                                </td>
                                <td>
                                    {{ $guide->name }}
                                </td>
                                <td>

                                    {{ $guide->email }}

                                </td>
                                <td>
                                    {{ $guide->phone }}
                                </td>
                                <td>
                                    <a class="btn btn-rounded btn-success" href="{{ url('local-guide/list/'. $guide->id) }}">Details</a>
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