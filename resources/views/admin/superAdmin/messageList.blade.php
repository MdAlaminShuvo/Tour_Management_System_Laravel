@extends('admin/layout')

@section('container')



    <div class="row">

   

   
        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Message List</h4>
                    <p class="card-description">


                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Message
                            </th>                  
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($messages as $message)

                                <tr>
                                <td>
                                    {{ $message->name }}
                                </td>
                                <td>

                                    {{ $message->email }}

                                </td>
                                <td>
                                    {{ $message->message }}
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