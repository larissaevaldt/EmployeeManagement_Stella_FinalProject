@extends('main')

@section('title', 'Get Message Send list')
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
                            <h4>Number of Shifts:<span class="ml-3">{{$project->number_of_shifts}} </span></h4>
                         
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <h4>Date:<span class="ml-3">{{ $project->date}}</span></h4>
                         
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h4>Working Hourse:<span class="ml-3">{{date('h:i A', strtotime($project->shifts()->where('project_id','=',$project->id)->first()->start_time))}} to {{

                                date('h:i A', strtotime($project->shifts()->where('project_id','=',$project->id)->first()->end_time))
                            }}</span></h4>
                         
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <h4>Number of Staff:<span class="ml-3">{{$project->number_of_staff}}</span></h4>
                         
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
                            <h4>Number of Shifts:<span class="ml-3"> </span>""""</h4>
                         
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <h4>Date:<span class="ml-3">"""</span></h4>
                         
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <h4>Working Hourse:<span class="ml-3">"""</span></h4>
                         
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
        
            <div> 
                <form class="px-4 py-4" method="post" action="{{route('message.store')}}">                 
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4 pb-0 filter">Add filters</label>
                    @csrf    
                    </div>
                      @if(isset($project))   
                            <input type="hidden" name="project_id" value="{{$project->id}}">
                      @endif
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Not banned from Company(ID)</label>
                        <div class="col-sm-8 pl-0">
                            <input name="banned" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Accept the job role of</label>
                        <div class="col-sm-8 pl-0">
                            <input name="not_job" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Min pay rate <= if stamp 2 visa status</label>
                        <div class="col-sm-8 pl-0">
                            <input name="pay_rat" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mt-4 ml-3">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg"></label>
                        <div class="col-sm-4 pl-0">
                            <input type="submit" class="pr-4 submit font ml-3 input-back-color form-control form-control-lg" id="colFormLabelLg" value="Generate list of candidate">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
    

@endsection

