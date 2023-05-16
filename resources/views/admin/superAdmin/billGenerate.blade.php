@extends('admin/layout')

@section('container')

    <div class="row"> 

        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Payment</h4>
                    <p class="card-description">
                        Pay to Guide-Host
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

                    <form class="forms-sample" method="post" action="{{ url('paid/guide-host/'.$id) }}" enctype="multipart/form-data">

                        @csrf

                        @if($getReview>0)

                            <div class="form-group">
                            <label for="exampleInputName1">Tourist Rating</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="rating" value="{{ $review->rating }}" required readonly>
                            </div>

                            
                            <div class="form-group">
                            <label for="exampleInputName1">Tourist Comment</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="comment" value="{{ $review->comment }}" required readonly>
                            </div>

                        @endif

                        <div class="form-group">
                        <label for="exampleInputName1">Bank Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="bankName" value="{{ $serviceHolder->bank_name }}" required readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Account No</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="accountNo" value="{{ $serviceHolder->account_no }}" required readonly>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Total Amount</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="totalAmount" value="{{ $totalPrice }}" required readonly>
                        </div>
      
                        <div class="form-group">
                        <label for="exampleInputName1">Transaction No</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="transactionNo" placeholder="Transaction No" required>
                        </div>
                        
                        <div class="form-group">
                        <label for="exampleInputName1">Payable Amount (Percentage)</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="payableAmount" placeholder="Percentage" required>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                    </div>
                </div>
                </div>
              

    </div>
    

@endsection()