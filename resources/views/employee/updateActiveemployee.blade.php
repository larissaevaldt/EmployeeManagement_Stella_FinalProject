@extends('main')

@section('title', 'Delete Employee')
@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/employee.css')}}">

@endsection
@section('body')   
@include('partials._nav')
@include('partials._messages')  
    <div class="container focusSet">
        <div class="area px-1 py-5 w-100">
            <h1 class="mx-3 pb-2 text-center">Update Weekly list of Active employee</h1>
            
            <div class="ml-3">
                <form class="px-4 py-4">
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4 ">GNIB expiry date after</label>
                        <div class="col-sm-7 pl-0 ">
                            <input name="fName" type="date" class="form-control input-back-color form-control-lg" id="gnib" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Manual handling expiry date</label>
                        <div class="col-sm-7 pl-0">
                            <input name="lName" type="date" class="form-control input-back-color form-control-lg" id="manual" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mt-4 ml-3">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg"></label>
                        <div class="col-sm-4 mt-3 pl-0 h-2">
                            <input type="button" class="h-100 submit font ml-3 input-back-color form-control form-control-lg p-3" id="dateSearch" value="Generate List">
                        </div>
                    </div>
                </form>
            </div>
            <div class=" mb-5 mt-4 align-items-center">
               <div class="mb-3">
                    <h1 class="ml-2">Manually select or search below to </h1>
                    <h1 class="ml-2">
                    <strong> Delete employees who quit or are on holidays</strong>
                    </h1>
               </div>
                <div class="search-form w-50 my-5">
                    <input class="search-form-input input-back-color" type="text" placeholder="Search" id="searchFinal" name="" autocomplete="off" autofocus="" value="">
                    <div class="search-form-icon">
                        <img class="searchList" src="{{ asset('/images/search_30px.png') }}">
                    </div>
                </div>
            </div>
             <!-- <div class="row d-none set-alert">
                    <div class="mt-4 col-md-4 offset-md-4 invalidData alert alert-danger" role="alert">
                        
                    </div>
            </div> -->
            <div>
                <form class="" method="post" action="{{ route('active.ids') }}">
                    @csrf
                    <div class="row-area input-width m-auto" id="employeeDataId">
                        
                    </div>
                    <input id="totalCount" type="hidden" name="totalEmployee">
                    <div class="w-60 m-auto">
                        <div class="form-group row mt-5 ml-3 mr-3">
                        <div class="col-sm-8 offset-sm-2">
                            <button type="submit" class="submit p-4 btn-font">
                                <h2 class="text-color">Generate final list</h2>
                            </button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
    

@endsection

@section('scriptAdd')
<script type="text/javascript" src="{{ asset('/js/update-active-employee.js') }}"></script>
@endsection

