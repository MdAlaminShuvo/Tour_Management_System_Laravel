@extends('admin/layout')

@section('container')

    <div class="row"> 

        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Banner</h4>
                    <p class="card-description">
                        Add Banner
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

                    <form class="forms-sample" method="post" action="{{ url('add/banner/process') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="title" placeholder="Title" required>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputName1">Subtitle</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="subtitle" placeholder="Subtitle" required>
                        </div>

                        <div class="form-group">
                       <label>Image</label>
                       <input type="file" class="file-upload-default" name="bannerImage" required>
                       <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                       </div>
                       </div>
                        
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                    </div>
                </div>
                </div>
              

    </div>
    

@endsection()