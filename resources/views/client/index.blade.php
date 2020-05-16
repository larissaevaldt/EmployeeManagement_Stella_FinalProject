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
                    <h1 class="ml-5 pb-2 text-center pl-5">List of all Clients</h1>
                    <h3 class="pb-2 ml-4 text-center text-color">Click on the line to get more information about Client</h3>
                    </div>
                </div>
            </div>
            <div class="form-aera border ml-3">
                <div>
                    <div class="row row-area">
                        <div class="col-sm-3 text-center text-color h4 py-2">ID
                        </div>
                        <div class="col-sm-3 text-center text-color h4 py-2">Company Name
                        </div>
                        <div class="col-sm-3 text-center text-color h4 py-2">Contact Name
                        </div>
                        <div class="col-sm-3 text-center text-color h4 py-2">Phone Number
                        </div>
                    </div>
                </div>

                @foreach($clients as $client)
                <a href="{{route('client.show',$client->id)}}">
                <div>
                    <div class="row row-area">
                        <div class="col-sm-3 text-center text-color h4 py-2">{{ $client->id }}
                        </div>
                        <div class="col-sm-3 text-center text-color h4 py-2">{{ $client->name }}
                        </div>
                        <div class="col-sm-3 text-center text-color h4 py-2">{{ $client->contact_fname }}
                        </div>
                        <div class="col-sm-3 text-center text-color h4 py-2">{{ $client->phone_number }}
                        </div>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
            <div class="form-group row mt-4 ml-3">
                <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg"></label>
                <div class="col-sm-8  pl-0">
                    <input type="submit" class="submit font input-back-color form-control form-control-lg w-50" id="colFormLabelLg" value="Close">
                </div>
            </div>
        </div>
    </div>

</div>
    

@endsection
