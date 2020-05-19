@extends('main')

@section('title', 'Send Message Page')
@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/employee.css')}}">

@endsection
@section('body')
@include('partials._nav')
@include('partials._messages')     
    <div class="container focusSet">

        <div class="area px-1 py-5 w-100">
        <form method="post" action="{{ route('project.message') }}">
            <h1 class=" pb-2 text-center">Message Generator</h1>
            <div class="form-group row my-3">
                @csrf
                <label for="colFormLabelLg" class="col-sm-5 msg-h1 col-form-label col-form-label-lg text-center pl-5">Enter the ID of a Project</label>
                <div class="col-sm-5 pl-0">
                    <input name="project_id" type="text" class="form-control input-back-color px-3 mt-1  form-control-lg" id="colFormLabelLg" placeholder="">
                </div>
                <div class="col-sm-2 pl-0">
                    <input type="submit" name="search_project" class="btn">
                </div>
            </div>
        </form>
            
        <center>
            @if(isset($project))    
            <div class="message-body border ml-3 w-75">
                <div class="form-group">
                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg ">Job Role: 
                        <span class="h4 mt-2 ml-3">{{ $project->job_role }}</span>
                    </label>

                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Company Name:
                    </label>
                    <span class="h4 mt-2 ml-0">{{ $project->company->name }}</span>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <h4>Date:<span class="ml-3">{{ $project->date}}</span></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <h4>Working Hours:<span class="ml-3">{{ $project->start_time}}&nbsp{{ $project->end_time}}</span></h4> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <h4>Number of Staff Needed:<span class="ml-3">{{$project->number_of_staff}}</span></h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <h4>Payment Rate:<span class="ml-3">{{ $project->rate_of_pay}}</span></h4> 
                        </div>
                    </div>
                </div>        
            </div>
            @else
            <div class="message-body border ml-3 w-75">
                <div class="form-group">
                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg ">Job Role: 
                        <span class="h4 mt-2 ml-3">"""""</span>
                    </label>

                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Company Name:
                    </label>
                    <span class="h4 mt-2 ml-0">"""</span>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <h4>Date:<span class="ml-3">"""</span></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <h4>Working Hours:<span class="ml-3">"""</span></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <h4>Number of Staff:<span class="ml-3">"""</span></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <h4>Payment Rate:<span class="ml-3">"""</span></h4>
                        </div>
                    </div>
                </div>        
            </div>
            @endif
            </center>

    @if(isset($project)) 
    <div class="container focusSet">
        <div class="area px-1 py-5 w-100">
            <div class="row pt-1 mb-4">
                <div class="col-sm-10 px-0 pl-5">
                    <div class="ml-5">
                    <h1 class="ml-5 pb-2 text-center pl-5">Here is a List of Suitable Employees</h1>
                    <h3 class="pb-2 ml-5 text-center text-color">Click on the line to get more information about employee</h3>
                    </div>
                </div>
            </div>
            <div class="form-area border ml-4">
                <div>
                    <div class="row row-area">
                        <div class="col-sm-3 text-center text-color h4 py-2">First Name
                        </div>
                        <div class="col-sm-3 text-center text-color h4 py-2">Last Name
                        </div>
                        <div class="col-sm-3 text-center text-color h4 py-2">Phone Number
                        </div>
                        <div class="col-sm-1 text-center text-color h4 py-2">Job Role
                        </div>
                        <div class="col-sm-2 text-center text-color h4 py-2">Min. Pay
                        </div>
                    </div>
                </div>
                <div>
                    @foreach($employees ?? '' as $employee)
                    <a href="{{ route('employee.show',[$employee->id])}}">
                        <div class="row row-area">
                            <div class="col-sm-3 text-center text-color h4 py-2">{{ $employee->first_name }}</div>
                            <div class="col-sm-3 text-center text-color h4 py-2">{{ $employee->last_name }}</div>
                            <div class="col-sm-3 text-center text-color h4 py-2">{{ $employee->phone_number }}</div>
                            <div class="col-sm-2 text-center text-color h4 py-2">{{ $employee->job_role }}</div>
                            <div class="col-sm-2 text-center text-color h4 py-2">{{ $employee->min_pay }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div>
            {{-- create a variable to store the numbers --}}
            <?php $var = '' ?>
            {{-- //for each employee returned from the controller, add to the variable with a comma --}}
            @foreach($employees ?? '' as $employee)
                <?php $var .= $employee->phone_number .= "," ?>
            @endforeach
            {{-- remove the last comma --}}
            <?php $var = rtrim($var,','); ?>

            <h1 class=" pb-2 text-center">We have automatically added all numbers from the list, you can delete if you want or add any others</h1>
            <h5 class=" pb-2 text-center">Just make sure to add numbers in the same format and separate numbers with comma, no space</h5>
            {{-- form for the user to type the message and send, it submits to the BulkSmsController@sendSMS --}}
            <form action="{{ route('send.message') }}" method="POST">
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                        @endforeach
                @endif

            <div class="form-group row my-3">
                @csrf
                {{-- pass the variable to the value of the input, so the phone number will automatically be put in the input box, bur the staff member can edit this, delete some numbers if they want or add other ones     --}}
                <input name="numbers" type="text" class="form-control input-back-color px-3 mt-1  form-control-lg" id="phone-numbers" placeholder="" value="{{$var}}">
                </div>
                <textarea class="form-control px-3 mt-1 form-control-lg" placeholder="Enter here the message to send for the employees" name='message'></textarea>
                <div class="col-sm-6 pl-0 mr-5">
                    <input id="send-message" type="submit" name="search_project" value="Send Message">
                </div>
            </div>
        </form>    
        </div>
    </div>
    @endif
</div>
@endsection

