@extends('admin/layout')

@section('container')

    <div class="row"> 

        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Virual Assistant Edit</h4>
                    
                    <p class="card-description">

                    </p>
                    
                    @if(Session::has('wrongInformation'))

                        <div class="alert alert-danger">

                            {{Session::get('wrongInformation')}}


                        </div>

                    @endif

                    @if(Session::has('success'))

                        <div class="alert alert-success">

                            {{Session::get('success')}}


                        </div>

                     @endif

                        <form action="{{ url('virtual-assistant/update/'.$userDetails->id ) }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{ $userDetails->name }}">
                            </div>

                            <div class="form-group">
                            <label for="exampleInputName1">Feature</label>
                            <textarea class="form-control" name="feature" id="" cols="10" rows="5">{{ $userDetails->feature }}</textarea>
                            </div>

                            <div class="form-group">
                            <label for="exampleInputName1">Price</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="price" value="{{ $userDetails->price }}">
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Update</button>

                        </form>

                    </div>
                </div>
                </div>
              

    </div>
    

@endsection()