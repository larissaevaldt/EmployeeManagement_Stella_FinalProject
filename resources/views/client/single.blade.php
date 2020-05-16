@extends('main')

@section('title', 'Client Details')
@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/employee.css')}}">

@endsection
@section('body')   
@include('partials._nav') 
    <div class="container focusSet">
        <div class="area px-1 py-5 w-100">
            <h1 class="mx-3 pb-2 text-center">Client Information</h1>           
            <div id="top-links" class="form-group row">
                        <div class="col-4">
                            <a href="{{ route('client.index')}}">
                                <input type="submit" class="submit font input-back-color form-control-lg w-50 close-btn" id="colFormLabelLg" value="Close" name="close">
                            </a>
                        </div>
                        <form class="col-3 mr-5" action="{{ route('client.destroy', $client->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                                <button class="submit font input-back-color form-control-lg w-100 close-btn" type="submit">Delete</button>
                        </form>
                        {{-- <div class="col-3">
                            <a href="{{ route('employee.index')}}">
                                <input type="submit" class="submit font input-back-color form-control-lg w-50 close-btn" id="colFormLabelLg" value="Delete" name="delete">
                            </a>
                        </div> --}}
                        <div class="col-4">
                        <a href="/client/{{$client->id}}/edit">
                                <input type="submit" class="submit font input-back-color form-control-lg w-50 close-btn" id="colFormLabelLg" value="Update" name="update">
                            </a>
                        </div>
                </div>
            </div>
            <div class="form-aera border ml-3">
                <form class="px-4 py-4">
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Company Name</label>
                        <div class="col-sm-8 pl-0">
                            <input name="fName" readonly="" 
                             type="text" class="form-control  input-back-color form-control-lg" id="colFormLabelLg" value="{{ $client->name }}" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">First Name</label>
                        <div class="col-sm-8 pl-0">
                            <input name="fName" readonly=""  type="text"
                             class="form-control input-back-color form-control-lg" id="colFormLabelLg" value="{{$client->contact_fname}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Last Name</label>
                        <div class="col-sm-8 pl-0">
                            <input name="fName"  type="text"
                            readonly class="form-control input-back-color form-control-lg" id="colFormLabelLg" value="{{$client->contact_lname}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Phone Number</label>
                        <div class="col-sm-8 pl-0">
                            <input name="lName" readonly="" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" value="{{$client->phone_number}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Email Address</label>
                        <div class="col-sm-8 pl-0">
                            <input name="phonNo" type="email"
                            readonly="" class="form-control input-back-color form-control-lg" id="colFormLabelLg" value="{{$client->email_address}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Country</label>
                        <div class="col-sm-8 pl-0">
                            <select disabled="disabled" class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3" value="" name="country">
                                <option>{{ $client->companyAddress->country }}</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Address 1</label>
                        <div class="col-sm-8 pl-0">
                            <input name="addressOne" type="text" readonly="" class="form-control input-back-color form-control-lg" id="colFormLabelLg" value="{{ $client->companyAddress->address_line1 }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Address 2</label>
                        <div class="col-sm-8 pl-0">
                            <input name="addressTwo" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" readonly="" value="{{ $client->companyAddress->address_line2 }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Town/City</label>
                        <div class="col-sm-8 pl-0">
                            <input name="city" type="text" readonly="" class="form-control input-back-color form-control-lg" id="colFormLabelLg" value="{{ $client->companyAddress->town_city }}">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg"></label>
                        <div class="col-sm-8 pl-0">
                            <h1 class="ml-5 py-3 ">Statistics</h1>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Total Projects</label>
                        <div class="col-sm-6 pl-0">
                            <input readonly name="fName" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" value="{{
                            $client->project->count()
                        }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Total Number of Complaints</label>
                        <div class="col-sm-6 pl-0">
                            <input readonly name="fName" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Complaints Relating to distance</label>
                        <div class="col-sm-6 pl-0">
                            <input readonly name="lName" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Complaints Relating to Rate of pay</label>
                        <div class="col-sm-6 pl-0">
                            <input readonly name="phonNo" type="email" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Complaints Relating to managers</label>
                        <div class="col-sm-6 pl-0">
                            <input readonly name="lName" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-6 font col-form-label col-form-label-lg text-center pl-4">Complaints Relating to bad traning</label>
                        <div class="col-sm-6 pl-0">
                            <input readonly name="phonNo" type="email" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required>
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
