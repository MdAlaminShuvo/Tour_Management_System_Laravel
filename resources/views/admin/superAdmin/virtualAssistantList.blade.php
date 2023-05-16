@extends('admin/layout')

@section('container')



    <div class="row">

   

   
        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Virtual Assistant</h4>
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
                                Price
                            </th>

                            <th>
                                Action
                            </th>
                          
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($virtualAssistant as $virtualAssistant)

                                <tr>
  
                                <td>
                                    {{ $virtualAssistant->name }}
                                </td>
                                <td>

                                    {{ $virtualAssistant->price }}

                                </td>

                                <td>
                                    <a class="btn btn-rounded btn-success" href="{{ url('virtual-assistant/list/'. $virtualAssistant->id) }}">Details</a>
                                    <a class="btn btn-rounded btn-primary" href="{{ url('virtual-assistant/edit/'. $virtualAssistant->id) }}">Edit</a>
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