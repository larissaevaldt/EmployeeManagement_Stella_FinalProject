@extends('main')
@section('title', 'Update Client')
@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/employee.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-select-country.min.css')}}">
@endsection
@section('body')
@include('partials._nav')
@include('partials._messages')    
    <div class="container focusSet">
        <div class="area px-1 py-5 w-100">
            <h2 class="mx-3 pb-2 text-center">Update Client</h2>
            <div class="form-aera border ml-3">
                <form class="px-4 py-4 " data-parsley-validate id="company" method="post" action="{{ route('client.update', $client->id) }}">
                @csrf
                @method('PATCH')
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Company Name</label>
                        <div class="col-sm-8 pl-0">
                            <input name="name" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{ $client->name }}" required data-parsley-pattern="^[a-zA-Z][a-zA-Z ]*$" data-parsley-trigger="keyup" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Client First Name</label>
                        <div class="col-sm-8 pl-0">
                            <input name="fname" type="tel" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{$client->contact_fname}}" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Client Last Name</label>
                        <div class="col-sm-8 pl-0">
                            <input name="lname" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{$client->contact_lname}}" required data-parsley-pattern="^[a-zA-Z\s]*$" data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Phone Number</label>
                        <div class="col-sm-8 pl-0">
                            <input name="phonNo" type="tel" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{$client->phone_number}}" required data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Email Address</label>
                        <div class="col-sm-8 pl-0">
                            <input name="email" type="email" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{$client->email_address}}" required data-parsley-type="email" data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Country</label>
                        <div class="col-sm-8 pl-0">
                            <select class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3 selectpicker countrypicker" data-default="{{ $client->companyAddress->country }}" data-live-search="true" data-flag="true" data-country="US" name="country" id="country" required data-parsley-trigger="keyup">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Address 1</label>
                        <div class="col-sm-8 pl-0">
                            <input name="addressOne" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{ $client->companyAddress->address_line1 }}" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Address 2</label>
                        <div class="col-sm-8 pl-0">
                            <input name="addressTwo" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{ $client->companyAddress->address_line2 }}" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Town/City</label>
                        <div class="col-sm-8 pl-0">
                            <input name="city" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{ $client->companyAddress->town_city }}" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row mt-4 ml-3">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg"></label>
                        <div class="col-sm-4 pl-0">
                            <input type="submit" class="submit font ml-4 input-back-color form-control form-control-lg" id="colFormLabelLg" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scriptAdd')
<script type="text/javascript">
    $('#company').parsley(); 
</script>
<script type="text/javascript" src="{{ asset('/js/bootstrap-select-country.min.js') }}"></script>
@endsection