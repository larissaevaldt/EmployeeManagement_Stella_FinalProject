@extends('main')

@section('title', 'Employee Deatial')
@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/employee.css')}}">

@endsection
@section('body')  
@include('partials._nav') 
    <div class="container focusSet">
        <div class="area px-1 py-5 w-100">
            <h1 class="mx-3 pb-2 text-center">Employee Information</h1>           
            <div id="top-links" class="form-group row">
                        <div class="col-3">
                            <a href="{{ route('employee.index')}}">
                                <input type="submit" class="submit font input-back-color form-control-lg w-50 close-btn" id="colFormLabelLg" value="Close" name="close">
                            </a>
                        </div>
                        <form action="{{ route('employee.destroy', $employee->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                                <button class="submit font input-back-color form-control-lg w-100 close-btn" type="submit">Delete</button>
                        </form>
                        {{-- <div class="col-3">
                            <a href="{{ route('employee.index')}}">
                                <input type="submit" class="submit font input-back-color form-control-lg w-50 close-btn" id="colFormLabelLg" value="Delete" name="delete">
                            </a>
                        </div> --}}
                        <div class="col-3">
                        <a href="/employee/{{$employee->id}}/edit">
                                <input type="submit" class="submit font input-back-color form-control-lg w-50 close-btn" id="colFormLabelLg" value="Update" name="update">
                            </a>
                        </div>
                        <div class="col-3">
                            <input type="submit" class="submit font input-back-color form-control-lg w-50 close-btn float-left ml-5" id="colFormLabelLg" value="Statistics" name="statics">
                        </div>
                </div>
            </div>
            <div class="form-aera border ml-3">
                <form class="px-4 py-4">
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Employee ID</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="employeeId" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{$employee->id}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">First Name</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly value="{{ $employee->first_name }}" name="fName" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Last Name</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly value="{{ $employee->last_name }}" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Phone Number</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly value="{{ $employee->phone_number }}" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Email Address</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly value="{{ $employee->email_address }}" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">DOB</label>
                        <div class="col-sm-8 pl-0">
                            <input type="date" class="form-control input-back-color form-control-lg" id="colFormLabelLg" readonly value="{{ $employee->date_of_birth }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Country</label>
                        <div class="col-sm-8 pl-0">
                            <select  disabled="disabled" class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3" name="country" readonly value="{{ $employee->employeeAddress->country }}" >
                                <option selected="">{{ $employee->employeeAddress->country }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Address 1</label>
                        <div class="col-sm-8 pl-0">
                            <input name="addressOne" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" readonly value="{{ $employee->employeeAddress->address_line1 }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Address 2</label>
                        <div class="col-sm-8 pl-0">
                            <input name="addressTwo" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" readonly value="{{ $employee->employeeAddress->address_line2 }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Town/City</label>
                        <div class="col-sm-8 pl-0">
                            <input name="city" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" readonly value="{{ $employee->employeeAddress->town_city }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Visa Status</label>
                        <div class="col-sm-8 pl-0">
                            <select disabled="disabled" class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3" name="visaStatus">
                                <option selected>{{ $employee->visa_status }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Visa Expiry Date</label>
                        <div class="col-sm-8 pl-0">
                            <input type="date" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" name="visaExpiry" readonly value="{{ $employee->visa_expire }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Max. Hours Per Week</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{$employee->work_hour}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">PPS Number</label>
                        <div class="col-sm-8 pl-0">
                            <input name="ppsNumber" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" readonly value="{{ $employee->pps_number }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Nationality</label>
                        <div class="col-sm-8 pl-0">
                            <select disabled="disabled" class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3" name="nationality">
                                <option selected>{{ $employee->employeeAddress->country }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Passport Number</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="form-control input-back-color form-control-lg " id="colFormLabelLg" readonly value="{{ $employee->passport_number }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 font text-center pl-4">Manual Handling</div>
                        <div class="col-sm-3">
                            <div class="form-check ml-1"> 
                                <input class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="checkbox" id="gridCheck1" name="manualyes" readonly value=""  @if($employee->manual_hand == "yes") ? checked="" : checked="false"
                                @endif>
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1" >
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input readonly class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="checkbox" id="gridCheck1" name="manualNo">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1" @if($employee->manual_hand == "no") ? checked="" : checked="false"
                                @endif>
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">MH Expairy Date</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="form-control input-back-color form-control-lg " id="colFormLabelLg" placeholder=""  readonly value="{{ $employee->manual_exp }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 font text-center pl-4">Banned Site</div>
                        <div class="col-sm-3">
                            <div class="form-check ml-1">
                                <input readonly class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="checkbox" id="gridCheck1" name="baneedyes">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input readonly class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="checkbox" id="gridCheck1" name="baneedNo">
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Add Job Role</label>
                        <div class="col-sm-8 pl-0">
                            <select disabled="disabled" class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3" name="jobRoll">
                                <option selected>{{ $employee->job_role }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 font text-center pl-4">Full Available</div>
                        <div class="col-sm-3">
                            <div class="form-check ml-1">
                                <input readonly  class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="checkbox" id="gridCheck1" @if($employee->manual_hand == "yes") ? checked="" : checked="false"
                                @endif>
                                <label class="form-check-label font  ml-4 mt-2" for="gridCheck1">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input readonly  class="form-check-input input-back-color font mr-4 mt-2 checkbox-width-height" type="checkbox" id="gridCheck1" name="fullAvailableNo" @if($employee->manual_hand == "no") ? checked="" : checked="false"
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
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="mundayStart" value="{{ 
                            substr(strip_tags($employee->employeeWorkingTime->mondayStart), 0 ,5)
                            }}">
                            <span class="text-bold mx-3 h3">To</span>
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="mundayLast" value="{{ 

                            substr(strip_tags($employee->employeeWorkingTime->mondayLast), 0 ,5)
                            }}">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Tuesday</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="tuesdayStart"  value="{{ 
                            substr(strip_tags($employee->employeeWorkingTime->tuesdayStart), 0 ,5)
                            }}">
                            <span class="text-bold mx-3 h3">To</span>
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="tuesdayLast" value="{{ 
                            substr(strip_tags($employee->employeeWorkingTime->tuesdayLast), 0 ,5)
                            }}">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Wednesday</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="wednesdayStart" value="{{ 
                            substr(strip_tags($employee->employeeWorkingTime->wednesdayStart), 0 ,5)
                            }}">
                            <span class="text-bold mx-3 h3">To</span>
                            <input readonly type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="wednesdayLast" value="{{ 

                            substr(strip_tags($employee->employeeWorkingTime->wednesdayLast), 0 ,5)
                            }}">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Thursday</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" readonly value="{{ 
                            substr(strip_tags($employee->employeeWorkingTime->thursdayStart), 0 ,5)
                            }}">
                            <span class="text-bold mx-3 h3">To</span>
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" name="thursdayLast" readonly value="{{ 

                            substr(strip_tags($employee->employeeWorkingTime->thursdayLast), 0 ,5)
                            }}">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Friday</label>
                        <div class="col-sm-8 pl-0">
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id="colFormLabelLg" placeholder="" readonly value="{{ 
                            substr(strip_tags($employee->employeeWorkingTime->fridayStart), 0 ,5)
                            }}">
                            <span class="text-bold mx-3 h3">To</span>
                            <input type="text" class="input-lg p-1 mt-2 input-back-color" id=" colFormLabelLg" placeholder="" name="FridayLast" readonly
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
                    
                </form>
        </div>
    </div>
</div>
@endsection
