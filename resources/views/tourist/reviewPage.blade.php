@extends('tourist/layout')

@section('container')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="{{ asset('assets/css/styleRating.css')}}" rel="stylesheet">

    <br>
    <br>

  
    @if($status==Null)

        <center><h1 class="justify-content-center">Review us</h1></center>

        <div class="container">
            <div class="row">
                <div class="col mt-4">
                    <form class="py-2 px-4" action="{{url('tour/review/submit/'.$id)}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                        
                        @csrf
                        
                        <p class="font-weight-bold ">Rating</p>
                        <div class="form-group row">
                            <div class="col">
                                <div class="rate">

                                    <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" class="rate" name="rating" value="4"/>
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" class="rate" name="rating" value="2">
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                    <label for="star1" title="text">1 star</label>

                                </div>
                            </div>

                        </div>

                        <div class="form-group row mt-4">

                            <div class="col">
                                <textarea class="form-control" name="comment" rows="6 " placeholder="Comment" maxlength="200"></textarea>
                            </div>

                        </div>
                        <div class="mt-3 text-right">

                            <button class="btn btn-sm py-2 px-3 btn-info">Submit</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @else
     
        <center><h1 class="justify-content-center">{{ $status }}</h1></center>

    @endif

@endsection()