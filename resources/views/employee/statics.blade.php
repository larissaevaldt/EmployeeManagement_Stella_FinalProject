@extends('main')

@section('title', 'Employee Statics')
@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/employee.css')}}">

@endsection
@section('body')  
@include('partials._nav')  
     <div class="container focusSet">
        <div class="area px-1 py-5 w-100">
            <h1 class="mx-3 pb-2 text-center">Employee Name: #######</h1>
            
            <div class="form-aera border ml-3">
                <form class="px-4 py-4">
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Work for agency since: </label>
                        <div class="col-sm-6 pl-0">
                            <input name="employeeId" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Number Of Shif Work Until now:</label>
                        <div class="col-sm-6 pl-0">
                            <input name="fName" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Number of Accepted shifts:</label>
                        <div class="col-sm-6 pl-0">
                            <input name="lName" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Number of banned site:</label>
                        <div class="col-sm-6 pl-0">
                            <input name="phonNo" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Total Number of Complaints:</label>
                        <div class="col-sm-6 pl-0">
                            <input name="eMail" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Time Canceld Last minute:</label>
                        <div class="col-sm-6 pl-0">
                            <input name="employeeId" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Number of Time did't Show up:</label>
                        <div class="col-sm-6 pl-0">
                            <input name="fName" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Number of time Arrived late</label>
                        <div class="col-sm-6 pl-0">
                            <input name="lName" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Number of bad performance Complaint</label>
                        <div class="col-sm-6 pl-0">
                            <input name="phonNo" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Email Address</label>
                        <div class="col-sm-6 pl-0">
                            <input name="eMail" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mt-4 ml-3">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg"></label>
                        <div class="col-sm-8  pl-0">
                            <input type="submit" class="submit font input-back-color form-control form-control-lg w-50" id="colFormLabelLg" value="Close">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
    

@endsection
