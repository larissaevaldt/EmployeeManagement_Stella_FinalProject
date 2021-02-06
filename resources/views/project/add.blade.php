{{-- main is the html skeleton that every page needs to have --}}
@extends('main')

{{-- change the title and add the css specially made for this page --}}
@section('title', 'Add a new project')
@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/project.css')}}">
@endsection

{{-- add the body of the add projects page --}}
@section('body')
{{-- including the navbar --}}
@include('partials._nav') 
{{-- this prints a message if project was added or not --}}
@include('partials._messages')
	
<div class="container focusSet">
	    <div class="area px-5 py-5 w-100">
	        <h1 class="mx-4 pl-3 pb-2 heading-text-color">Add a new project</h1>
	        <div class="form-area ml-3 px-4">

	            <form class="px-4 py-4" id="add-project-form"  method="post" action="{{ route('project.store')}}" data-parsley-validate>
	            	@csrf 
	                <div class="form-group row">
	                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg">Company</label>
	                    <div class="col-sm-8 pl-0">
	                    	<select required class="form-control form-control-lg input-back-color" id="company-name-id" name="company_id">
								@foreach($companies as $company)
									<option value="{{$company->id}}">{{$company->name}}</option>
	                    		@endforeach
	                    	</select>
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg">Job Role</label>
	                    <div class="col-sm-8 pl-0">
	                    	<select required class="form-control form-control-lg input-back-color" id="job-role" name="job_role">
	                    		@foreach($jobRole as $job)
	                    		<option value="{{$job['job_role']}}">{{$job['job_role']}}</option>
	                    		@endforeach
	                    	</select>
	                        
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg">Job Description</label>
	                    <div class="col-sm-8 pl-0">
	                        <textarea class="form-control form-control-lg input-back-color" rows="3" id="job-description" name="project_description" required  data-parsley-trigger="keyup" ></textarea>
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg">Number of Staff</label>
	                    <div class="col-sm-8 pl-0">
	                        <input type="number" class="form-control form-control-lg input-back-color" id="no-of-staff" name="number_of_staff" placeholder="" required data-parsley-pattern="^[0-9]*$" data-parsley-trigger="keyup" data-parsley-min="1">
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg">Rate of Pay</label>
	                    <div class="col-sm-8 pl-0">
	                    	<input type="text" class="form-control form-control-lg input-back-color" id="rate-of-pay" name="rate_of_pay" placeholder="" required data-parsley-pattern="^[0-9]+([\,\.][0-9]+)?$" data-parsley-trigger="keyup" data-parsley-min="10.10">
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg">Date</label>
	                    <div class="col-sm-8 pl-0">
	                        <input type="date" class="form-control form-control-lg input-back-color" id="date" name="date" placeholder="" data-parsley-trigger="keyup">
	                    </div>
	                </div> 
																	
					<div id="working-hour-div">
	                	<fieldset>
		                	<div class="form-group row">
	                            <div class="col-sm-8 offset-sm-4 pl-0" id="weekly-hour-error"data-parsley-errors-container="#weekly-error">
	                            </div>
	                  </div>
		                	<div class="form-group row mb-3" id="weekly-error">
			                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg">Working Hours</label>
			                    <div class="col-sm-8 pl-0">
			                        <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="working-hour-start" name="workingStart" placeholder="00:00" required data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" data-parsley-trigger="keyup">
			                        <span class="mx-3 h3 float-left mt-2">to</span>
			                        <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="working-hour-finish" name="workingFinish" placeholder="00:30" required data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" data-parsley-trigger="keyup">
			                    </div>
		                	</div>
	                	</fieldset>
	                </div>
	                {{-- <div class="form-group row mb-3 mt-2">
	                    <div class="col-sm-6 offset-sm-6">
	                        <input type="button" class="text-color submit h-100 p-2 form-control form-control-lg job-role-text" id="add-working-hour" value="Add different working hours for same date" name="addWorkingHour">
	                    </div>
	                </div> --}}
	                <div class="form-group row">
	                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg">Location</label>
	                    <div class="col-sm-8 pl-0">
	                        <input type="text" class="form-control form-control-lg input-back-color" id="location" name="location" placeholder="" required >
	                    </div>
	                </div>
	                <!-- <div class="form-group row">
	                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg"></label>
	                    <div class="col-sm-8 pl-0">
	                        <label for="colFormLabelLg" class="mr-5 font col-form-label col-form-label-lg float-right">Add another job role</label>
	                    </div>
																	</div> -->
						<div class="form-group row">
	                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg">Entered By</label>
	                    <div class="col-sm-8 pl-0">
	                        <input type="text" class="form-control form-control-lg input-back-color" id="job-role" name="entered_by" placeholder="" value="{{Auth::user()->name}}&nbsp;{{Auth::user()->sur_name}}" readonly="readonly" required>
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg"></label>
	                    <div class="col-sm-4 pl-0">
	                        <input type="submit" class="submit h-100 p-3 form-control form-control-lg" id="add-project" name="addProject" value="Submit">
	                    </div>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>

</div>
@endsection

@section('scriptAdd')
	<script type="text/javascript" src="{{ asset('/js/project.js') }}">
	</script>
@endsection