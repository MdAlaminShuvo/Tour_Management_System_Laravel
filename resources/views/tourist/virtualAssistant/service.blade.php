
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('assets/css/styleVirtualAssistant.css') }}">

<title>Ghurte Jabo</title>

<div class="container">

    <div class="row clearfix">

            <div class="header display-inline-css" style="diplay:inline-css !important">

                <div>

                    <!-- <img src="{{ asset('assets/img/logo.png') }}"  style="width:100px;height:100px; border-radius:50%;margin-bottom:10px;" alt="avatar">  -->

                </div>

                <div>

                    <h2 style="font-size:40px !important; text-align:center; margin-bottom:40px;"><strong>Ghurte </strong> Jabo</h2>


                </div>

                
            </div>
    <div class="col-lg-12">
        <div class="card">

           
           
            <div class="chat">
                
                <div class="chat-header clearfix">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img src="{{ asset('assets/img/vr.png') }}" alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0">Virtual Assistant</h6>
                                <small></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-history">
                    <ul class="m-b-0">

                        <li class="clearfix">
                           

                            @if($question != null)

                                <div class="message-data text-right">

                                    <img src="{{ url('storage/'.Auth::user()->profile_photo_path) }}" alt="avatar"> <b>{{ Auth::user()->name }} (You)</b>

                                </div>

                                <div class="message other-message float-left"> <b>Question : </b> {{ $question }} </div>

                                <br>
                                <br>

                                <div style="display:inline-css !important" class=" display-inline-css float-right">


                                    <div class="float:right">

                                        <img src="{{ asset('assets/img/vr.png') }}"  style="width:40px;height:40px; border-radius:50%;margin-bottom:10px;" alt="avatar"> <b>Virtual Assistant</b>

                                    </div>

                                    <div class="message other-message float-right">
    
                                        <b>Reply : </b>    {{ $answer }} 

                                    </div>

                                </div>

                                

                            @else

                                <div class="message other-message float-right"> Please ask me ... </div>

                            @endif

                        </li>
                                                     
                    </ul>
                </div>
                <form method="get" action="/virtual-assistant/service/{{$id}}">

                    @csrf

                    <div class="chat-message clearfix">

                        <div class="input-group mb-0">

                            <div class="input-group-prepend">
                            <button type="submit"> <span class="input-group-text" style="border:none !important;"><i class="fa fa-send"></i></span> </button>  
                            </div>
                            <input type="text" class="form-control" name="question" placeholder="Enter text here...">                                  
                        
                        </div>
                    
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>