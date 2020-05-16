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
	                    <div class="ml-5 pb-2 text-center pl-5 heading-text-color mt-4">
	                        <label class="h1">You are finishing the project&nbsp</label>
	                        <label class="h1" id="project-id">
	                        	{{ $project->id }}</label>
	                    </div>
	                    <h1 class="ml-5 pb-2 text-center pl-5 heading-text-color mt-3">Any problem with this project?</h1>
	                </div>
	            </div>
	            <div class="col-sm-2 px-0">

	            </div>
	        </div>

	        <div>
	            <div class="w-100 m-auto">
	                <div class="">
	                    <div class="w-50 m-auto">
	                        <div class="form-group row mt-5 m-auto">
	                            <div class="col-sm-6">
	                                <!-- <input type="submit" name="sendConfirmation" class="submit font p-4 btn-font" value="Send Confirmation"> -->
	                                <button class="submit p-4 w-75 form-control ml-5 h-100 btn-yes">
	                                    <h2 class="text-color">yes</h2>
	                                </button>
	                            </div>
	                            <div class="col-sm-6">
	                                <!-- <input type="submit" name="sendDismisal" class="submit font p-4 btn-font" value="Send Dismisal Message"> -->
	                                <button class="submit p-4 w-75 form-control h-100">
	                                    <h2 class="text-color">no</h2>
	                                </button>
	                            </div>
	                        </div>
	                    </div>
	                </div>



	         <form id="projectForm" method="POST" action="{{route('project.final', $project->id)}}">
	                <div class="form-group row mt-5 w-75
	                         m-auto">
	                        @csrf
	                    <div class="col-sm-12">
	                        <h2 class="text-color mt-4">If you said yes, please tell us what happend, was their any agency mistake?</h2>
	                    </div>
	                </div>
	                <input type="hidden" name="project_id" value="{{$project->id}}">
	                <div class="form-group row mt-5 w-75
	                         m-auto">
	                    <div class="col-sm-12">
	                        <textarea name="project_problem" readonly class="mt-3 form-control form-control-lg input-back-color" rows="4" id="comment"></textarea>
	                    </div>
	                </div>
	            </form>
	                <div class="row mt-5 w-75 m-auto">
	                    <div class="col-sm-12">
	                        <h2 class="text-color mt-4">If there was any problems with a particular employee Search the employee name below and tick the box for the problems</h2>
	                    </div>
	                </div>

	                <div class="mt-3">
	                   <div class=" mb-5 mt-4 align-items-center">
	                       <div class="search-form w-50">
	                           <input class="search-form-input input-back-color set-search-class search_record" type="text" placeholder="Search" name="search" autocomplete="off" autofocus="" value="">
	                           <div class="search-form-icon">
	                               <img class="search_employee" src="{{ asset('/images/search_30px.png') }}">
	                           </div>
	                           
	                       </div>
	                       <div class="row d-none set-alert">
	                           <div class="mt-4 col-md-4 offset-md-4 invalidData alert alert-danger" role="alert">
	                               
	                           </div>
	                       </div>
	                       
	                   </div>
	                </div>

	                <form id="employeeProfile">
	                    <div class="form-group row mt-5 w-75
	                         m-auto pb-3">
	                        <div class="col-sm-7 pl-0 mt-3">
	                            <div class="">
	                                <label class="h1">Name:&nbsp</label>
	                                <label class="h1" id="employee-name">#########</label>
	                            </div>
	                        </div>
	                        <div class="col-sm-5 pl-0 mt-3">
	                            <div class="float-right">
	                                <label class="h1">ID:&nbsp</label>
	                                <label class="h1" id="employee-id">#########</label>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="row-area w-75 m-auto">
	                        <input type="hidden" name="employee_id" class="employee-id">
	                        <input type="hidden" name="project_id" value="{{ $project->id }}">
	                        <div class="form-group row row-area mb-0 py-2 border-bottom-0 pt-3 pb-3">
	                            <div class="col-sm-2">
	                                <div class="form-check ml-2">
	                                    <input class="form-check-input ml-3 checkbox-width-height" type="checkbox" value="Cancelled Last Time" name="cancelled">
	                                </div>
	                            </div>
	                            <div class="col-sm-10">
	                                <label class="h2 ml-2 heading-text-color">Cancelled Last Time</label>
	                            </div>
	                        </div>
	                        <div class="form-group row row-area mb-0 py-2 border-bottom-0 pt-3 pb-3">
	                            <div class="col-sm-2">
	                                <div class="form-check ml-2">
	                                    <input class="form-check-input ml-3 checkbox-width-height" type="checkbox" name="show_up" value="Did't Show Up">
	                                </div>
	                            </div>
	                            <div class="col-sm-10">
	                                <label class="h2 ml-2 heading-text-color">Did't Show Up</label>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="row-area w-75 m-auto">
	                        <div class="form-group row row-area mb-0 py-2 border-bottom-0 pt-3 pb-3">
	                            <div class="col-sm-2">
	                                <div class="form-check ml-2">
	                                    <input class="form-check-input ml-3 checkbox-width-height" type="checkbox" name="arrived" value="Arrived Late">
	                                </div>
	                            </div>
	                            <div class="col-sm-10">
	                                <label class="h2 ml-2 heading-text-color">Arrived Late</label>
	                            </div>
	                        </div>
	                        <div class="form-group row row-area mb-0 py-2 border-bottom-0 pt-3 pb-3">
	                            <div class="col-sm-2">
	                                <div class="form-check ml-2">
	                                    <input class="form-check-input ml-3 checkbox-width-height" type="checkbox" name="bad_performace" value="Bad Performance">
	                                </div>
	                            </div>
	                            <div class="col-sm-10">
	                                <label class="h2 ml-2 heading-text-color">Bad Performance</label>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <div class="m-auto pt-5">
	                            <input type="submit" class="submit p-3 form-control form-control-lg h-100" id="employeeSaveProblem" value="Save to employee profile">
	                        </div>
	                    </div>
	                </form>
	                <div class="row mt-5 w-75 m-auto">
	                    <div class="col-sm-12">
	                        <h2 class="text-color mt-4 text-center">Did any employee complain about the company?</h2>
	                    </div>
	                </div>

	                <div class="mt-3">
	                    <div class="form-group row mt-5 w-75
	                         m-auto">
	                        <div class="col-sm-8 offset-sm-2">
	                            <div class="search-div search-div-employee">
	                            	<input type="hidden" name="client_id" class="client-id">
	                                <div class="search-form">
	                                    <input class="search-form-input input-back-color set-search-class search-client-record" type="text" placeholder="Search" name="search" autocomplete="off" autofocus="" value="" id="search_for_company">
	                                    <div class="search-form-icon">
	                               <img class="search_client-click" src="{{ asset('/images/search_30px.png') }}">
	                           </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-sm-4 pl-0">
	                            <!-- <input type="button" class="submit p-3 form-control form-control-lg h-100" id="employeSaveProfile" value="Search"> -->
	                            <!-- <input type="submit" class="submit p-4 form-control form-control-lg" id="colFormLabelLg" value="Search"> -->
	                        </div>
	                    </div>
	                </div>
	                <div class="row d-none set-alert-company">
	                    <div class="mt-4 col-md-4 offset-md-4 invalidDataCompany alert alert-danger" role="alert">
	                        
	                    </div>
	                </div>
	                <form class="" id="compnay_profile">
	                    <div class="form-group row mt-5 pb-3 w-75
	                         m-auto">
	                        <div class="col-sm-7 pl-0 mt-3">
	                            <div class="">
	                                <label class="h1">Name:&nbsp</label>
	                                <label class="h1" id="client-name">#########</label>
	                            </div>
	                        </div>
	                        <div class="col-sm-5 pl-0 mt-3">
	                            <div class="float-right">
	                                <label class="h1">ID:&nbsp</label>
	                                <label class="h1" id="client-id">####</label>
	                            </div>
	                        </div>
	                    </div>
	                    <div>
	                     <input type="hidden" name="client_id" class="client-id">
	                     <input type="hidden" name="project_id" value="{{ $project->id }}">
	                    <div class="row-area w-75 m-auto">
	                        <div class="form-group row row-area mb-0 py-2 border-bottom-0 pt-3 pb-3">
	                            <div class="col-sm-2">
	                                <div class="form-check ml-2">
	                                    <input class="form-check-input ml-3 checkbox-width-height" type="checkbox" id="gridCheck1" name="transport_problem" value="To far / No Public Transport">
	                                </div>
	                            </div>
	                            <div class="col-sm-10">
	                                <label class="h2 ml-2 heading-text-color">To far / No Public Transport</label>
	                            </div>
	                        </div>
	                        <div class="form-group row row-area mb-0 py-2 border-bottom-0 pt-3 pb-3">
	                            <div class="col-sm-2">
	                                <div class="form-check ml-2">
	                                    <input class="form-check-input ml-3 checkbox-width-height" type="checkbox" id="gridCheck1" name="pay_rate" value="Bad Rate Of Pay">
	                                </div>
	                            </div>
	                            <div class="col-sm-10">
	                                <label class="h2 ml-2 heading-text-color">Bad Rate Of Pay</label>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="row-area w-75 m-auto">
	                        <div class="form-group row row-area mb-0 py-2 border-bottom-0 pt-3 pb-3">
	                            <div class="col-sm-2">
	                                <div class="form-check ml-2">
	                                    <input class="form-check-input ml-3 checkbox-width-height" type="checkbox" id="gridCheck1" name="manager_problem" value="Rude Managers">
	                                </div>
	                            </div>
	                            <div class="col-sm-10">
	                                <label class="h2 ml-2 heading-text-color">Rude Managers</label>
	                            </div>
	                        </div>
	                        <div class="form-group row row-area mb-0 py-2 border-bottom-0 pt-3 pb-3">
	                            <div class="col-sm-2">
	                                <div class="form-check ml-2">
	                                    <input class="form-check-input ml-3 checkbox-width-height" type="checkbox" id="gridCheck1" name="traning" value="Bad Training">
	                                </div>
	                            </div>
	                            <div class="col-sm-10">
	                                <label class="h2 ml-2 heading-text-color">Bad Training</label>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <div class="m-auto pt-5">
	                            <input type="submit" class="submit p-3 form-control form-control-lg h-100" id="colFormLabelLg" value="Save to company profile">
	                        </div>
	                    </div>
	                </form>

	                <div class="form-group row">
	                    <div class="m-auto pt-4">
	                        <input type="submit" class="submit p-3 pl-5 pr-5 form-control form-control-lg h-100" id="colFormLabelLg" value="Mark project finish"  form="projectForm">
	                    </div>
	                </div>

	        	
	        </div>
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('scriptAdd')
	<script type="text/javascript">
		var urlPicker = "";
        var serializedData; 
		$(document).ready(function(){
        $('.search_employee').click(function(){

            if($('.search_record').val() == ""){
                alert('Please Enter The Employee ID first')
                console.log($('.search_record').val());
            }else{

                $.ajax({
                    url: "{{ route('employee.search') }}",
                    method: 'GET',
                    data: {query: $('.search_record').val()},
                    dataType: 'json',
                    success:function(data){
             			
                        if(data.employee==null){
                            console.log(data['fail']);
                            $('.set-alert').removeClass('d-none');
                            $('.invalidData').html(data['fail']);
                            $('#employee-name').html("###");
                            $('#employee-id').html("#####");       
      						$('.employee-id').val("###");

                        }else{
      						$('#employee-name').html(data.employee['first_name']+" "+data.employee['last_name']);
      						$('#employee-id').html(data.employee['id']);       
      						$('.employee-id').val(data.employee['id']);
      
                        }                      
                    }
                });
            }
        });


        $('.search_client-click').click(function(){

            if($('.search-client-record').val() == ""){
                alert('Please Enter The Company ID first')
                console.log($('.search-client-record').val());
            }else{

                $.ajax({
                    url: "{{ route('employee.search') }}",
                    method: 'GET',
                    data: {query: $('.search-client-record').val()},
                    dataType: 'json',
                    success:function(data){
                    console.log(data)

                        if(data.employee==null){
                            $('.set-alert-company').removeClass('d-none');
                            $('.invalidDataCompany').html(data['fail']);
                            $('#client-name').html("###");
                            $('#client-id').html("#####");       
      						$('.client-id').val("###");
                        }else{
         urlPicker = data.employee['id'];
         $('#client-name').html(data.employee['first_name']+" "+data.employee['last_name']);
         $('#client-id').html(data.employee['id']);
         $('.client-id').val(data.employee['id']);       
    

                        }                      
                    }
                });
            }
        

        $('.set-search-class').click(function(){
            $('.set-alert-company').addClass('d-none');
        });

    });

        $('.btn-yes').click(function(){
            $('#comment').removeAttr('readonly');
        });

        $('#employeSaveProfile').click(function(){

        });

        $('.set-search-class').click(function() {
            $('.set-alert').addClass('d-none');
        });

        $('#employeeProfile').submit(function(event){

        	  event.preventDefault();

        	if($('.set-search-class').val() == ""){
        	        alert('Please Enter The Employee ID first')
        	              
          }else{
          

       	    var $form = $(this);
       	    var $inputs = $form.find("input, select, button, textarea,checkbox");

       	
       	    var serializedData = $form.serialize();
       	    console.log(serializedData)
       	    $inputs.prop("disabled", true);

       	    // Fire off the request to /form.php
       	    request = $.ajax({
       	        url: "{{ route('profile.save')}}",
       	        type: "get",
       	        data: serializedData
       	    });

       	    request.done(function (response, textStatus, jqXHR){
       	        // Log a message to the console
       	        $('.set-alert').removeClass('d-none');
                $('.invalidData').html(textStatus);
       	    });

       	    request.fail(function (jqXHR, textStatus, errorThrown){
       	        // Log the error to the console
       	        console.error(
       	            "The following error occurred: "+
       	            textStatus, errorThrown
       	        );
       	    });

       	    request.always(function () {
       	        // Reenable the inputs
       	        $inputs.prop("disabled", false);
       	    });

        	  
          }
       
        });

        $('#compnay_profile').submit(function(event){

        	  event.preventDefault();

        	if($('#search_for_company').val() == ""){
        	        alert('Please Enter The Employee ID first')
        	              
          }else{
          

       	    var $form = $(this);
       	    var $inputs = $form.find("input, select, button, textarea,checkbox");

       	
       	    var serializedData = $form.serialize();
       	    console.log(serializedData)
       	    $inputs.prop("disabled", true);

       	    // Fire off the request to /form.php
       	    request = $.ajax({
       	        url: "{{ route('profile.saveCompany')}}",
       	        type: "get",
       	        data: serializedData
       	    });

       	    request.done(function (response, textStatus, jqXHR){
       	        // Log a message to the console
       	        $('.set-alert-company').removeClass('d-none');
                $('.invalidDataCompany').html(textStatus);
       	    });

       	    request.fail(function (jqXHR, textStatus, errorThrown){
       	        // Log the error to the console
       	        console.error(
       	            "The following error occurred: "+
       	            textStatus, errorThrown
       	        );
       	    });

       	    request.always(function () {
       	        // Reenable the inputs
       	        $inputs.prop("disabled", false);
       	    });

        	  
          }
       
        });

    });
	</script>
@endsection