@extends('main')

@section('title', 'View Finished Projects')
@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/project.css')}}">

@endsection
@section('body')
@include('partials._nav_search')
	<div class="container">
	    <div class="py-4 w-100">
	        <div class="row pt-1 mb-4">
	            <div class="col-sm-10 px-0 pl-5">
	                <div class="ml-5">
	                    <h1 class="ml-5 pb-2 text-center pl-5 heading-text-color">Employees that denied</h1>
	                    <div class="ml-5 pb-2 text-center pl-5 heading-text-color">
	                        <label class="h1" id="retrieve-count">12</label>
	                        <label class="h1">&nbspdenied out of&nbsp</label>
	                        <label class="h1" id="total-count">30</label>
	                        <label class="h1">&nbspsent messages</label>
	                    </div>
	                    <div class="ml-5 pb-2 text-center pl-5 heading-text-color">
	                        <label class="h1">Total need for this project:&nbsp</label>
	                        <label class="h1" id="total-project">8</label>
	                    </div>
	                    <h3 class="ml-5 pb-2 text-center pl-5 text-color">See the list of who denied below</h3>
	                </div>
	            </div>
	            <div class="col-sm-2 px-0">

	            </div>
	        </div>

	        <div class="w-100 m-auto">
	            <form class="">
	                <div class="row-area w-50 m-auto">
	                    <div class="form-group row row-area mb-0 py-2 border-bottom-0">
	                        <div class="col-sm-2">
	                        </div>
	                        <div class="col-sm-10 font font-denied">
	                            <label class="h2 ml-4">Example checkbox</label>
	                        </div>
	                    </div>
	                    <div class="form-group row row-area mb-0 py-2 border-bottom-0">
	                        <div class="col-sm-2">
	                        </div>
	                        <div class="col-sm-10 font font-denied">
	                            <label class="h2 ml-4">Example checkbox</label>
	                        </div>
	                    </div>
	                </div>

	                <div class="form-group row mt-5">
	                    <div class="col-sm-12">
	                    	<a href="{{ url('/ongoing') }}">
	                    		<input type="submit" name="sendConfirmation" class="form-control form-control-lg submit p-3 h-100 m-auto w-25 text-uppercase m-auto" value="Close">
	                    	</a>
	                    </div>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
</div>
@endsection