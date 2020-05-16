@extends('main')

@section('title', 'Dashboard')

@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/project.css')}}">
@endsection

@section('body')
@include('partials._nav_search') 
	<div class="container">
	    <div class="py-4 w-100">
	        <div class="pt-1 mt-3 text-center heading-text-color">
	            <label class="h1 ml-5">Welcome back,&nbsp</label>
													<label class="h1">{{ Auth::user()->name}}</label>
	            <label class="h1">!</label>
	        </div>
	        <div class="mt-1 text-center">
	            <label class="h1 ml-5 pb-2 heading-text-color">Check our on-going projects at the moment</label>
	        </div>
	        <div class="mt-1 text-center">
	            <label class="h3 ml-5 pb-2 text-color">Click on the event to get more information</label>
	        </div>

	        @foreach($projects as $project)
	        <div class="row w-75 m-auto mb-3 border-bottom">
	            <div class=" col-md-6 offset-md-4 mt-3">
	            	<a href="{{route('project.show',$project->id)}}">
	            		<div class="project-summary" id="">
		                    <div class="">
		                        <label class="h3">ID: </label>
		                        <label class="h3" id="project-id">{{$project->id}}</label>
		                    </div>
		                    <div class="h3" id="company-name">{{  $project->company->name
		                    }}</div>
		                    <div class="progressBar-div">
		                        <div id="project-progress" class="progressBar">
		                        </div>
		                    </div>
		                    <div class="">
		                        <label class="h3">Found </label>
		                        <label class="h3" id="retrieve-count">10</label>
		                        <label class="h3"> out of</label>
		                        <label class="h3" id="total-count">15</label>
		                    </div>
		                    <div class="">
		                        <label class="h3">Message Sent: </label>
		                        <label class="h3 float-right">15</label>
		                    </div>
		                    <div class="">
		                        <label class="h3">Denied: </label>
		                        <label class="h3 float-right">43</label>
		                    </div>
	                	</div>
	            	</a>
	            </div>
	        </div>
	         @endforeach
	    </div>
	</div>
</div>
@endsection