@extends('main')

@section('title', 'Update Employee')
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
            <h1 class="mx-3 pb-2 text-center">Update Employee</h1>
            <div class=" mb-5 mt-4 align-items-center">
                <form class="search-form w-50" >
                    <input class="search-form-input input-back-color set-search-class search_record" type="text" placeholder="Enter Employee ID" name="search" autocomplete="off" autofocus="" value="">
                    <div class="search-form-icon">
                        <img class="search_employee" src="{{ asset('/images/search_30px.png') }}">
                    </div>
                </form>
                {{-- div below is used to display an error message in case the id entered is invalid --}}
                <div class="row d-none set-alert">
                    <div class="mt-4 col-md-4 offset-md-4 invalidData alert alert-danger" role="alert">  
                    </div>
                </div> 
            </div>

            <div class="form-aera border ml-3">
                <form class="px-4 py-4"  id="add-employee-form" method="post"  data-parsley-validate>
                    @csrf
                    <input type="hidden" name="_method" value="PUT"> 
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">First Name</label>
                        <div class="col-sm-8 pl-0">
                            <input name="first_name" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Last Name</label>
                        <div class="col-sm-8 pl-0">
                            <input name="last_name" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Phone Number</label>
                        <div class="col-sm-8 pl-0">
                            <input name="phone_number" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Email Address</label>
                        <div class="col-sm-8 pl-0">
                            <input name="email_address" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-type="email" data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">DOB</label>
                        <div class="col-sm-8 pl-0">
                            <input type="date" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" name="date_of_birth" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Country</label>
                        <div class="col-sm-8 pl-0">
                            <select class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3 selectpicker countrypicker" data-live-search="true" data-flag="true" data-country="US" name="country" id="country" required data-parsley-trigger="keyup">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Address 1</label>
                        <div class="col-sm-8 pl-0">
                            <input name="address_line1" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Address 2</label>
                        <div class="col-sm-8 pl-0">
                            <input name="address_line2" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Town/City</label>
                        <div class="col-sm-8 pl-0">
                            <input name="town_city" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Visa Status</label>
                        <div class="col-sm-8 pl-0">
                            <select class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3" name="visa_status" required data-parsley-trigger="keyup">
                                <option value="EU">EU</option>
                                <option value="Stamp2">Stamp 2</option>
                                <option value="Stamp1G">Stamp 1G</option>
                                <option value="Stamp4">Stamp 4</option>
                                <option value="WorkPermit">Work Permit</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Visa Expiry Date</label>
                        <div class="col-sm-8 pl-0">
                            <input type="date" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" name="visa_expire" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Max. Hours Per Week</label>
                        <div class="col-sm-8 pl-0">
                            <input name="work_hour" type="number" class="form-control input-back-color form-control-lg" id="work-hours" placeholder="" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Status</label>
                        <div class="col-sm-8 pl-0">
                            <select class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3" name="status" required data-parsley-trigger="keyup">
                                <option selected>Employee Status</option>
                                <option value="Active">Active</option>
                                <option value="InActive">InActive</option>
                            </select>
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">PPS Number</label>
                        <div class="col-sm-8 pl-0">
                            <input name="pps_number" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-pattern="^[0-9]{7}[A-Z]{2}$" data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Nationality</label>
                        <div class="col-sm-8 pl-0">
                            <select class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3 selectpicker countrypicker" data-live-search="true" data-flag="true" name="nationality" id="country" required data-parsley-trigger="keyup">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Passport Number</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="form-control input-back-color form-control-lg " id="passport-number" placeholder="" name="passport_number" required data-parsley-pattern="^(?!^0+$)[a-zA-Z0-9]{6,9}$" data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 font text-center pl-4">Manual Handling</div>
                        <div class="col-sm-3">
                            <div class="form-check ml-1">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" value="yes" type="radio" id="manual-hand" name="manual_hand" data-parsley-trigger="keyup">
                                <label class="form-check-label font  ml-4 mt-2" for="manual-hand">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="radio" id="gridCheck1" name="manual_hand" value="no" data-parsley-trigger="keyup">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">MH Expiry Date</label>
                        <div class="col-sm-8 pl-0">
                            <input type="date" class="form-control input-back-color form-control-lg " id="MH-date" placeholder="" name="manual_exp" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 font text-center pl-4">Banned Site</div>
                        <div class="col-sm-3">
                            <div class="form-check ml-1">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="radio" id="banned-yes" name="banned" value="yes" data-parsley-trigger="keyup">
                                <label class="form-check-label font  ml-4 mt-2" for="banned-yes">
                                    Yes
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="form-check">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="radio" id="banned-no" name="banned" value="no" data-parsley-trigger="keyup">
                                <label class="form-check-label font  ml-4 mt-2" for="banned-no">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4"></label>
                        <div class="col-sm-8 pl-0  text-color submit h-100 p-2 form-control form-control-lg job-role-text">
                            <select class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3 js-example-basic-multiple" name="bannedArr[]" multiple="multiple" id="banned-site-div">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- <div id="banned-site-div" class="d-none">
                        <div class="form-group row">
                            <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4"></label>
                            <div class="col-sm-8 pl-0">
                                <input type="text" class="form-control input-back-color form-control-lg " id="banned-site-1" placeholder="" name="banned_site_1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4"></label>
                        <div class="col-sm-8 pl-0">
                            <input type="hidden" class="form-control input-back-color form-control-lg " id="banned-site-count" placeholder="" name="banned_site_count">
                        </div>
                    </div>
                    <div class="form-group row mb-3 mt-2 d-none" id="banned-site-button">
                        <div class="col-sm-6 offset-sm-6">
                            <input type="button" class="text-color submit h-100 p-2 form-control form-control-lg job-role-text" id="add-working-hour" value="Add another banned site" name="addWorkingHour">
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Add Job Role</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="form-control input-back-color form-control-lg " id="colFormLabelLg" placeholder="" name="job_role" id="job-role" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Min Pay Rate</label>
                        <div class="col-sm-8 pl-0">

                            <input type="text" class="form-control input-back-color form-control-lg " id="colFormLabelLg" placeholder="" name="min_pay" id="pay-rate" required data-parsley-trigger="keyup">

                        </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-4 font text-center pl-4">Full Available</div>
                        <div class="col-sm-3">
                            <div class="form-check ml-1">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="radio" id="full-available" name="full_available" value="yes" data-parsley-trigger="keyup">
                                <label class="form-check-label  font ml-4 mt-2" for="full-available">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="radio" id="no-available" name="full_available" value="no" data-parsley-trigger="keyup">
                                <label class="form-check-label font  ml-4 mt-2" for="no-available" >
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div id="weekly_timing" class="d-none">
                        <fieldset>
                            <div class="form-group row">
                                <div class="col-sm-8 offset-sm-4 pl-0" id="weekly-hour-error"data-parsley-errors-container="#weekly-error">   
                                </div>
                            </div>
                            <div class="form-group row" id="weekly-error">
                                <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Monday</label>
                                <div class="col-sm-8 pl-0">
                                    <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="monday-to" name="mondayStart" placeholder="00:00" data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" data-parsley-trigger="keyup">
                                    <span class="mx-3 h3 float-left mt-2">to</span>
                                    <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="monday-from" name="mondayLast" placeholder="00:30" data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" data-parsley-trigger="keyup"> 
                                </div>
                            </div>
                            <div class="form-group row" id="weekly-error">
                                <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Tuesday</label>
                                <div class="col-sm-8 pl-0">
                                    <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="tuesday-to" placeholder="" name="tuesdayStart" data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"
                                    data-parsley-trigger="keyup">
                                    <span class="mx-3 h3 float-left mt-2">to</span>
                                    <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="tuesday-from" placeholder="" name="tuesdayLast" data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"data-parsley-trigger="keyup">  
                                </div>
                            </div>
                            <div class="form-group row" id="weekly-error">
                                <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Wednesday</label>
                                <div class="col-sm-8 pl-0">
                                    <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="wednesday-to" placeholder="" name="wednesdayStart" data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"data-parsley-trigger="keyup">
                                    <span class="mx-3 h3 float-left mt-2">to</span>
                                    <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="wednesday-from" placeholder="" name="wednesdayLast" data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"data-parsley-trigger="keyup"> 
                                </div>
                            </div>
                            <div class="form-group row" id="weekly-error">
                                <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Thursday</label>
                                <div class="col-sm-8 pl-0">
                                    <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="thrusday-to" placeholder="" name="thursdayStart" data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"data-parsley-trigger="keyup">
                                    <span class="mx-3 h3 float-left mt-2">to</span>
                                    <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="thrusday-from" placeholder="" name="thursdayLast" data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"data-parsley-trigger="keyup">
                                </div>
                            </div>
                            <div class="form-group row" id="weekly-error">
                                <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Friday</label>
                                <div class="col-sm-8 pl-0">
                                    <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="friday-to" placeholder="" name="FridayStart" data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"data-parsley-trigger="keyup">
                                    <span class="mx-3 h3 float-left mt-2">to</span>
                                    <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="friday-from" placeholder="" name="FridayLast" data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"data-parsley-trigger="keyup">
                                </div>
                            </div>
                            <div class="form-group row" id="weekly-error">
                                <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Saturday</label>
                                <div class="col-sm-8 pl-0">
                                    <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="saturday-to" placeholder="" name="saturdayStart" data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"data-parsley-trigger="keyup">
                                    <span class="mx-3 h3 float-left mt-2">to</span>
                                    <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="saturday-from" placeholder="" name="saturdayLast" data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"data-parsley-trigger="keyup">  
                                </div>
                            </div>
                            <div class="form-group row" id="weekly-error">
                                <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Sunday</label>
                                <div class="col-sm-8 pl-0">
                                    <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="sunday-to" placeholder="" name="sundayStart" data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"data-parsley-trigger="keyup">
                                    <span class="mx-3 h3 float-left mt-2">to</span>
                                    <input type="time" class="form-control form-control-lg input-back-color w-45 float-left" id="sunday-from" placeholder="" name="sundayLast" data-parsley-pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"data-parsley-trigger="keyup">   
                                </div>
                            </div>
                        </fieldset>
                    </div>  
                    <div class="form-group row mt-4 ml-3">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg"></label>
                        <div class="col-sm-4 pl-0">
                            <input type="submit" class="submit font ml-3 input-back-color form-control form-control-lg" id="colFormLabelLg" value="Submit">
                        </div>
                    </div>
                {{-- <input type="hidden" name="_token" value="{{Session::token()}}">
                {{method_field('PATCH')}} --}}
                </form>
            </div>
        </div>
    </div>
</div>
    

@endsection

@section('scriptAdd')
<script type="text/javascript" src="{{ asset('/js/banned.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/update-employee.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap-select-country.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/select2.min.js') }}"></script>
@endsection
