@extends('main')

@section('title', 'Employee List')
@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/employee.css')}}">

@endsection
@section('body') 
@include('partials._nav')   
    <div class="container focusSet">
        <div class="area px-1 py-5 w-100">
            <div class="row pt-1 mb-4">
                <div class="col-sm-10 px-0 pl-5">
                    <div class="ml-5">
                    <h1 class="ml-5 pb-2 text-center pl-5">List of Employees</h1>
                    <h3 class="pb-2 ml-4 text-center text-color">Click on the line to get more information about employee</h3>
                    </div>
                </div>
            </div>
            <div class="form-area border ml-4">
                <div>
                    <div class="row row-area">
                        <div class="col-sm-2 text-center text-color h4 py-2">ID
                        </div>
                        <div class="col-sm-3 text-center text-color h4 py-2">First Name
                        </div>
                        <div class="col-sm-3 text-center text-color h4 py-2">Last Name
                        </div>
                        <div class="col-sm-3 text-center text-color h4 py-2">Phone Number
                        </div>
                    </div>
                </div>
                <div>
                    @foreach($employees as $employee)
                    <a href="{{ route('employee.show',[$employee->id])}}">
                        <div class="row row-area">
                            <div class="col-sm-2 text-center text-color h4 py-2">{{ $employee->id }}</div>
                            <div class="col-sm-3 text-center text-color h4 py-2">{{ $employee->first_name }}</div>
                            <div class="col-sm-3 text-center text-color h4 py-2">{{ $employee->last_name }}</div>
                            <div class="col-sm-3 text-center text-color h4 py-2">{{ $employee->phone_number }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="form-group row mt-4 ml-3">
                <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg"></label>
                <div class="col-sm-4  pl-0">
                    {{-- <input type="submit" class="submit font input-back-color form-control form-control-lg w-50" id="colFormLabelLg" value="Close"> --}}
                    <a href="{{ route('home')}}">
                        <input type="submit" class="submit font input-back-color form-control form-control-lg w-5" id="colFormLabelLg" value="Close" name="close">
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
    

@endsection
