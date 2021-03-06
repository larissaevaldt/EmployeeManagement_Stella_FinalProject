@extends('main')

@section('title', 'Finished Project Info')
@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/project.css')}}">

@endsection
@section('body')
@include('partials._nav') 
	<div class="container">
	    <div class="py-4 w-100">
	        <div class="row pt-1 mb-4 mt-3">
	            <div class="col-sm-10 px-0 pl-5">
	                <div class="ml-5">
	                    <h1 class="ml-5 pb-2 text-center pl-5 heading-text-color">Project Information</h1>
	                </div>
	            </div>
	            <div class="col-sm-2 px-0">
	                <a href="{{ route('project.index') }}">
	                    <img src="{{ asset('/images/icons8-delete-100.png') }}" class="w-25 ml-5 mt-1">
	                </a>
	            </div>
	        </div>
	        <div class="form-area ml-3">
	            <div class="mt-5 ml-4 mb-5">
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">Project ID: </label>
	                    <label class="h1 heading-text-color">{{$project->id}}</label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">Company Name: </label>
	                    <label class="h1 heading-text-color">{{$project->company->name}}</label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">Order Received at: </label>
	                    <label class="h1 heading-text-color">
	                    	{{$project->date}}
	                    </label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">Order Entered on System at: </label>
	                    <label class="h1 heading-text-color">
	                    	{{$project->created_at}}	                    	
	                    </label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">Order Entered on System by: </label>
	                    <label class="h1 heading-text-color">
	                    	{{$project->entered_by}}
	                    </label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">Job Role: </label>
	                    <label class="h1 heading-text-color">
	                    	{{$project->job_role}}
	                    </label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">Job Description: </label>
	                    <label class="h1 heading-text-color">
	                    	{{$project->project_description}}
	                    </label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">No of Staff: </label>
	                    <label class="h1 heading-text-color">
	                    	{{$project->number_of_staff}}
	                    </label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1">No of Shifts: </label>
	                    <label class="h1">
	                    	{{$project->number_of_shifts}}
	                    </label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">Date: </label>
	                    <label class="h1 heading-text-color">
	                    	{{$project->date}}
	                    </label>
	                </div>
	                
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">Location: </label>
	                    <label class="h1 heading-text-color">
	                    	{{$project->location}}
	                    </label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">No of messages sent: </label>
	                    <label class="h1 heading-text-color"></label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">No of employess who accepted: </label>
	                    <label class="h1 heading-text-color"></label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">No of employess who denied: </label>
	                    <label class="h1 heading-text-color"></label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">Project Status: </label>
	                    <label class="h1 heading-text-color">{{$project->status}}</label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">Finished by: </label>
	                    <label class="h1 heading-text-color">{{ $project->entered_by}}</label>
	                </div>
	                <div class="ml-3 mb-1">
	                    <label class="h1 heading-text-color">Finished at: </label>
	                    <label class="h1 heading-text-color">{{$project->updated_at}}</label>
	                </div>
	            </div>
	            <div class="row mt-3 mb-5 pl-4 pr-4">
	                <div class="col-sm-4 pl-5">
	                    <a href="#">
	                        <button type="submit" class="form-control form-control-lg submit p-4 h-100 m-auto">
	                            See who accepted
	                        </button>
	                    </a>
	                </div>
	                <div class="col-sm-4">
	                    <a href="#">
	                        <button type="submit" class="form-control form-control-lg submit p-4 m-auto h-100">
	                            See who
	                            <br>denied
	                        </button>
	                    </a>
	                </div>
	                <div class="col-sm-4 pr-5">
	                    <a href="#">
	                        <button type="submit" class="form-control form-control-lg submit p-4 m-auto h-100">
	                            See who worked
	                        </button>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection