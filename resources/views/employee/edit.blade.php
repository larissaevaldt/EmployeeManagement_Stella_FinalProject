@extends('main')
@section('title', 'Employee Deatial')
@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/employee.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-select-country.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/select2.min.css') }}" />
@endsection
@section('body')  
@include('partials._nav') 
    <div class="container focusSet">
        <div class="area px-1 py-5 w-100">
            <h1 class="mx-3 pb-2 text-center">Edit Employee</h1>           
            </div>
            <div class="form-aera border ml-3">
               @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                      </ul>
                  </div><br />
               @endif
             <form class="px-4 py-4" method="post" action="{{ route('employee.update',$employee->id) }}">
              {{-- <input type="hidden" name="_method" value="PUT"> --}}
                    <div class="form-group row">
                        @csrf
                        @method('PATCH')
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Employee ID</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="employeeId" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{$employee->id}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">First Name</label>
                        <div class="col-sm-8 pl-0">
                            <input value="{{ $employee->first_name }}" name="fName" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Last Name</label>
                        <div class="col-sm-8 pl-0">
                            <input value="{{ $employee->last_name }}" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Phone Number</label>
                        <div class="col-sm-8 pl-0">
                            <input value="{{ $employee->phone_number }}" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Email Address</label>
                        <div class="col-sm-8 pl-0">
                            <input value="{{ $employee->email_address }}" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">DOB</label>
                        <div class="col-sm-8 pl-0">
                            <input type="date" class="form-control input-back-color form-control-lg" id="colFormLabelLg" value="{{ $employee->date_of_birth }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Country</label>
                        <div class="col-sm-8 pl-0">
                        <select class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3 selectpicker countrypicker" data-default="{{ $employee->employeeAddress->country }}" data-live-search="true" data-flag="true" data-country="US" name="country" id="country" required data-parsley-trigger="keyup">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Address 1</label>
                        <div class="col-sm-8 pl-0">
                            <input name="addressOne" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{ $employee->employeeAddress->address_line1 }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Address 2</label>
                        <div class="col-sm-8 pl-0">
                            <input name="addressTwo" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{ $employee->employeeAddress->address_line2 }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Town/City</label>
                        <div class="col-sm-8 pl-0">
                            <input name="city" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{ $employee->employeeAddress->town_city }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Visa Status</label>
                        <div class="col-sm-8 pl-0">
                            <select class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3" name="visaStatus">
                                <option selected>{{ $employee->visa_status }}</option>
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
                            <input type="date" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" name="visaExpiry" value="{{ $employee->visa_expire }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Max. Hours Per Week</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{$employee->work_hour}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">PPS Number</label>
                        <div class="col-sm-8 pl-0">
                            <input name="ppsNumber" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" value="{{ $employee->pps_number }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Nationality</label>
                        <div class="col-sm-8 pl-0">
                            <select class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3 selectpicker countrypicker" data-default="{{ $employee->employeeAddress->nationality }}" data-live-search="true" data-flag="true" name="nationality" id="country" required data-parsley-trigger="keyup">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Passport Number</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="form-control input-back-color form-control-lg " id="colFormLabelLg" value="{{ $employee->passport_number }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 font text-center pl-4">Manual Handling</div>
                        <div class="col-sm-3">
                            <div class="form-check ml-1">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" value="yes" type="radio" id="manual-hand" name="manual_hand" @if($employee->manual_hand == "yes") ? checked="" : checked="false" @endif required data-parsley-trigger="keyup">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="radio" id="gridCheck1" name="manual_hand" value="no" @if($employee->manual_hand == "no") ? checked="" : checked="false" @endif required data-parsley-trigger="keyup">

                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="col-sm-4 font text-center pl-4">Manual Handling</div>
                        <div class="col-sm-3">
                            <div class="form-check ml-1"> 
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="checkbox" id="gridCheck1" name="manualyes" value=""  @if($employee->manual_hand == "yes") ? checked="" : checked="false"
                                @endif>
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1" >
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="checkbox" id="gridCheck1" name="manualNo">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1" @if($employee->manual_hand == "no") ? checked="" : checked="false"
                                @endif>
                                    No
                                </label>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">MH Expiry Date</label>
                        <div class="col-sm-8 pl-0">
                            <input type="date" class="form-control input-back-color form-control-lg " id="MH-date" placeholder="" name="manual_exp" value="{{ $employee->manual_exp }}" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-4 font text-center pl-4">Banned Site</div>
                        <div class="col-sm-3">
                            <div class="form-check ml-1">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="radio" id="banned-yes" name="banned" value="yes" @if($employee->banned == "yes") ? checked="" : checked="false" @endif required data-parsley-trigger="keyup">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    Yes
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="form-check">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="radio" id="banned-no" name="banned" value="no" @if($employee->banned == "no") ? checked="" : checked="false" @endif required data-parsley-trigger="keyup">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
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
                    {{-- <div class="form-group row">
                        <div class="col-sm-4 font text-center pl-4">Banned Site</div>
                        <div class="col-sm-3">
                            <div class="form-check ml-1">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="checkbox" id="gridCheck1" name="baneedyes">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="checkbox" id="gridCheck1" name="baneedNo">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    No
                                </label>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Add Job Role</label>
                        <div class="col-sm-8 pl-0">
                            <select class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3" name="jobRoll">
                                <option selected>{{ $employee->job_role }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 font text-center pl-4">Full Available</div>
                        <div class="col-sm-3">
                            <div class="form-check ml-1">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="checkbox" id="gridCheck1" @if($employee->manual_hand == "yes") ? checked="" : checked="false"
                                @endif>
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="checkbox" id="gridCheck1" name="fullAvailableNo" @if($employee->manual_hand == "no") ? checked="" : checked="false"
                                @endif>
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    @if($employee->full_available == "no")
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Monday</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="mundayStart" value="{{ 
                            substr(strip_tags($employee->employeeWorkingTime->mondayStart), 0 ,5)
                            }}">
                            <span class="text-bold mx-3 h3">To</span>
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="mundayLast" value="{{ 

                            substr(strip_tags($employee->employeeWorkingTime->mondayLast), 0 ,5)
                            }}">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Tuesday</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="tuesdayStart"  value="{{ 
                            substr(strip_tags($employee->employeeWorkingTime->tuesdayStart), 0 ,5)
                            }}">
                            <span class="text-bold mx-3 h3">To</span>
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="tuesdayLast" value="{{ 
                            substr(strip_tags($employee->employeeWorkingTime->tuesdayLast), 0 ,5)
                            }}">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Wednesday</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="wednesdayStart" value="{{ 
                            substr(strip_tags($employee->employeeWorkingTime->wednesdayStart), 0 ,5)
                            }}">
                            <span class="text-bold mx-3 h3">To</span>
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="wednesdayLast" value="{{ 

                            substr(strip_tags($employee->employeeWorkingTime->wednesdayLast), 0 ,5)
                            }}">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Thursday</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" value="{{ 
                            substr(strip_tags($employee->employeeWorkingTime->thursdayStart), 0 ,5)
                            }}">
                            <span class="text-bold mx-3 h3">To</span>
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="thursdayLast" value="{{ 

                            substr(strip_tags($employee->employeeWorkingTime->thursdayLast), 0 ,5)
                            }}">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Friday</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder=""  value="{{ 
                            substr(strip_tags($employee->employeeWorkingTime->fridayStart), 0 ,5)
                            }}">
                            <span class="text-bold mx-3 h3">To</span>
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id=" colFormLabelLg" placeholder="" name="FridayLast"
                            value="{{ 

                            substr(strip_tags($employee->employeeWorkingTime->fridayLast), 0 ,5)
                            }}"
                            >
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Saturday</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" value="{{ 
                            substr(strip_tags($employee->employeeWorkingTime->saturdayStart), 0 ,5)
                            }}">
                            <span class="text-bold mx-3 h3">To</span>
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="saturdayLast" readonly
                            value="{{ 

                            substr(strip_tags($employee->employeeWorkingTime->saturdayLast), 0 ,5)
                            }}">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Sunday</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" value="{{ 
                            substr(strip_tags($employee->employeeWorkingTime->sundayStart), 0 ,5)
                            }}">
                            <span class="text-bold mx-3 h3">To</span>
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="sundayLast" readonly value="{{ 

                            substr(strip_tags($employee->employeeWorkingTime->sundayLast), 0 ,5)
                            }}">    
                        </div>
                    </div>
                    @endif
                    <div class="form-group row my-5">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Hours Worked This Week</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="bic" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>

                    <div class="col-3">
                            <input type="submit" class="submit font input-back-color form-control-lg w-50 close-btn float-left ml-5" id="colFormLabelLg" value="Submit" name="submit">
                    </div>
                   {{-- <input type="hidden" name="_token" value="{{Session::token()}}">
                   {{method_field('PUT')}}   --}}
                </form>
        </div>
    </div>
</div>
@endsection
@section('scriptAdd')
<script type="text/javascript" src="{{ asset('/js/banned.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap-select-country.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/select2.min.js') }}"></script>
@endsection
