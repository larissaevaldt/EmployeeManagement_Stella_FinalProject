@extends('main')

@section('title', 'Delete Employee')
@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/employee.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-select-country.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/select2.min.css') }}" />
@endsection
@section('body')
@include('partials._nav')
@include('partials._messages')    
    <div class="container focusSet">
        <div class="area px-1 py-5 w-100">
            <h1 class="mx-3 pb-2 text-center">Delete Employee</h1>
            <div class=" mb-5 mt-4 align-items-center">
                <form class="search-form w-50">
                    <input class="search-form-input input-back-color set-search-class search_record" type="text" placeholder="Search" name="search" autocomplete="off" autofocus="" value="">
                    <div class="search-form-icon">
                        <img class="search_employee" src="{{ asset('/images/search_30px.png') }}">
                    </div>
                    
                </form>
                <div class="row d-none set-alert">
                    <div class="mt-4 col-md-4 offset-md-4 invalidData alert alert-danger" role="alert">
                        
                    </div>
                </div>
            </div>
            <div class="form-aera border ml-3">
                <form class="px-4 py-4" id="set-empty">
                    @csrf
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">First Name</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="first_name" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Last Name</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="last_name" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Phone Number</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="phone_number" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Email Address</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="email_address" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">DOB</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="date" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" name="date_of_birth">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Country</label>
                        <div class="col-sm-8 pl-0">
                            <input disabled="disabled" class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3" name="country" id="country">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Address 1</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="address_line1" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Address 2</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="address_line2" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Town/City</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="town_city" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Visa Status</label>
                        <div class="col-sm-8 pl-0">
                            <input disabled="disabled" class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3" name="visa_status">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Visa Expiry Date</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="date" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" name="visa_expire">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Max. Hours Per Week</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly="" name="work_hour" type="number" class="form-control input-back-color form-control-lg" id="work-hours" placeholder="" required data-parsley-pattern="^([1-9]|1[0-9]|2[0-4])$" data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">PPS Number</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="pps_number" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Nationality</label>
                        <div class="col-sm-8 pl-0">
                            <input disabled="disabled" class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3" name="nationality">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Passport Number</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="text" class="form-control input-back-color form-control-lg " id="colFormLabelLg" placeholder="" name="passport_number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 font text-center pl-4">Manual Handling</div>
                        <div class="col-sm-3">
                            <div class="form-check ml-1">
                                <input readonly class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" value="yes" type="radio" id="gridCheck1" name="manual_hand">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input readonly class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="radio" id="gridCheck1" name="manual_hand" value="no">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">MH Expairy Date</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="date" class="form-control input-back-color form-control-lg " id="MH-date" placeholder="" name="manual_exp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 font text-center pl-4">Banned Site</div>
                        <div class="col-sm-3">
                            <div class="form-check ml-1">
                                <input readonly class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="radio" id="gridCheck1" name="banned" value="yes">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    Yes
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="form-check">
                                <input readonly class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="radio" id="gridCheck1" name="banned" value="no">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Add Job Role</label>
                        <div class="col-sm-8 pl-0">
                            <input disabled="disabled" class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3" name="job_role">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Min Pay Rate</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="text" class="form-control input-back-color form-control-lg " id="colFormLabelLg" placeholder="" name="min_pay">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 font text-center pl-4">Full Available</div>
                        <div class="col-sm-3">
                            <div class="form-check ml-1">
                                <input readonly class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="radio" id="gridCheck1" name="full_available"  value="yes">
                                <label class="form-check-label  font  ml-4 mt-2" for="gridCheck1">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input readonly class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="radio" id="gridCheck1" name="full_available" value="no">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1" >
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Monday</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="text" class="form-control form-control-lg input-back-color w-45 float-left" id="monday-to" name="mondayStart" placeholder="">
                            <span class="mx-3 h3 float-left mt-2">to</span>
                            <input readonly type="text" class="form-control form-control-lg input-back-color w-45 float-left" id="monday-to" name="mondayLast" placeholder=""> 
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Tuesday</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="tuesdayStart">
                            <span class="text-bold mx-3 h3">To</span>
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="tuesdayLast">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Wednesday</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="wednesdayStart">
                            <span class="text-bold mx-3 h3">To</span>
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="wednesdayLast">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Thursday</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="thursdayStart">
                            <span class="text-bold mx-3 h3">To</span>
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="thursdayLast">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Friday</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="FridayStart">
                            <span class="text-bold mx-3 h3">To</span>
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="FridayLast">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Saturday</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="saturdayStart">
                            <span class="text-bold mx-3 h3">To</span>
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="saturdayLast">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Sunday</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="sundayStart">
                            <span class="text-bold mx-3 h3">To</span>
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="sundayLast">    
                        </div>
                    </div>
                    
                </form>
                <div class="form-group row  ml-3">
                    <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg"></label>
                    <div class="col-sm-4 pl-0">
                        <form method="post" id="deleteForm">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input readonly type="submit" class=" submit font ml-3 input-back-color form-control form-control-lg" id="colFormLabelLg1" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scriptAdd')
<script type="text/javascript" src="{{ asset('/js/delete-employee.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/banned.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap-select-country.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/select2.min.js') }}"></script>
@endsection