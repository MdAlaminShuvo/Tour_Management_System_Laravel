@extends('admin/layout')

@section('container')



    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Balance Statement</h4>
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
                                Amount
                            </th>
                            
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($paymentOrders as $paymentOrder)

                                <tr>

                                <td>

                                    {{ $paymentOrder->from_date }}

                                </td>

                                <td>

                                    {{ $paymentOrder->to_date }}

                                </td>

                                <td>

                                    {{ $paymentOrder->place->name }}

                                </td>
                                <td>

                                    {{ $paymentOrder->name }}

                                </td>
                                <td>

                                    {{ $paymentOrder->email }}

                                </td>
                                <td>

                                    {{ $paymentOrder->pay_guide_host }}

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