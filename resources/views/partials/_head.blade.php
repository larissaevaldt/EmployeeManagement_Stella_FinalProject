<!DOCTYPE html>
<html>
<head>
	{{-- what yield does in blade is it allows us to select and alter after --}}
	{{-- after including this file i can say for example: @section('title', 'Add a new project') and add whatever title I want --}}
	<title>@yield('title')</title>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/menu.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/parsley.css')}}">
 {{-- copied from the chart tutuorial --}}
    <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>	
	<script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>	
	{{-- this yield is for the case we want to add any other style particular to the page importing this header --}}
	@yield('styleAdd')
</head>

