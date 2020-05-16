<!DOCTYPE html>
<html>
<head>
	{{-- what yield does in blade is it allows us to select and alter after --}}
	{{-- after including this file i can say for example: @section('title', 'Add a new project') and add whatever title I want --}}
	<title>@yield('title')</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/menu.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/parsley.css')}}">
	{{-- this yield is for the case we want to add any other style particular to the page importing this header --}}
	@yield('styleAdd')
</head>

