@extends('admin/layout')

@section('container')

    <div class="row"> 

        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Super Admin</h4>
                    <p class="card-description">
                        Add Super Admin
                    </p>

                    @if ($errors->any())

                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif

                    @if(Session::has('success'))

                        <div class="alert alert-success">

                            {{Session::get('success')}}


                        </div>

                    @endif

                    <form class="forms-sample" method="post" action="{{ url('add/super-admin/process') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name" required>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="email" class="form-control" id="exampleInputName1" name="email" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Password</label>
                        <input type="password" class="form-control" id="exampleInputName1" name="password" placeholder="Password" required>
                        </div>
                        
                
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                    </div>
                </div>
                </div>
              

    </div>
    

@endsection()