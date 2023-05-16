@extends('admin/layout')

@section('container')

    <div class="row"> 

        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Return Booking</h4>
                    <p class="card-description">
                        Return amount to Tourist & Service Holder
                    </p>


                    @if(Session::has('success'))

                        <div class="alert alert-success">

                            {{Session::get('success')}}


                        </div>

                    @endif

                    @if(Session::has('wrong'))

                        <div class="alert alert-danger">

                            {{Session::get('wrong')}}


                        </div>

                    @endif

                    <form class="forms-sample" method="post" action="{{ url('return/booking/confirm/'.$id) }}" enctype="multipart/form-data">

                        @csrf

                        
                        <div class="form-group">
                        <label for="exampleInputName1">Total Amount</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="totalAmount" value="{{ $bookingInformation->amount }}" required readonly>
                        </div>

                        <p class="card-description">
                            For Tourist
                        </p>

                        <div class="form-group">
                        <label for="exampleInputName1">Bank Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="bankName" value="{{ $user->bank_name }}" required readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Account No</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="accountNo" value="{{ $user->account_no }}" required readonly>
                        </div>
      
                        <div class="form-group">
                        <label for="exampleInputName1">Transaction No</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="transactionNo" placeholder="Transaction No" required>
                        </div>
                        
                        <div class="form-group">
                        <label for="exampleInputName1">Payable Amount (Percentage)</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="payableAmount" placeholder="Percentage" required>
                        </div>

                        <p class="card-description">
                            For Service Holder
                        </p>

                        <div class="form-group">
                        <label for="exampleInputName1">Bank Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="bankName" value="{{ $serviceHolderInformation->bank_name }}" required readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Account No</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="accountNo" value="{{ $serviceHolderInformation->account_no }}" required readonly>
                        </div>

      
                        <div class="form-group">
                        <label for="exampleInputName1">Transaction No</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceHolderTransactionNo" placeholder="Transaction No" required>
                        </div>
                        
                        <div class="form-group">
                        <label for="exampleInputName1">Payable Amount (Percentage)</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="serviceHolderPayableAmount" placeholder="Percentage" required>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                    </div>
                </div>
                </div>
              

    </div>
    

@endsection()