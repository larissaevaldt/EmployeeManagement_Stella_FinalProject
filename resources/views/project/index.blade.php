@extends('main')

@section('title', 'View Finished Projects')
@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/project.css')}}">

@endsection
@section('body')
@include('partials._nav_search')
@include('partials._messages') 
    <div class="container">
        <div class="py-4 w-100">
            <div class="row pt-1 mb-4">
                <div class="col-sm-10 px-0 pl-5">
                    <div class="ml-5">
                        <h1 class="ml-5 pb-2 text-center pl-5 heading-text-color">List of all finished projects</h1>
                        <h3 class="ml-5 pb-2 text-center pl-5 text-color">Click on the project to get more information</h3>
                    </div>
                </div>
                <div class="col-sm-2 px-0">
                    <a href="{{ route('project.index') }}">
                        <img src="{{ asset('/images/icons8-delete-100.png') }}" class="w-25 ml-5 mt-3">
                    </a>
                </div>
            </div>
            <div>
                <div class="row row-area">
                    <div class="col-sm-3 text-center text-color h4 py-2">ProjectID</div>
                    <div class="col-sm-3 text-center text-color h4 py-2">Company Name</div>
                    <div class="col-sm-3 text-center text-color h4 py-2">Date Entered</div>
                    <div class="col-sm-3 text-center text-color h4 py-2">Date Finished</div>
                </div>
                @foreach($projects as $project)
                <a href="{{ route('project.singleFinsh',$project->id) }}">
                    <div class="row row-area">
                        <div class="col-sm-3 text-center text-color h4 py-2">{{$project->id}}</div>
                        <div class="col-sm-3 text-center text-color h4 py-2">{{$project->company->name}}</div>
                        <div class="col-sm-3 text-center text-color h4 py-2">{{
                            date('M j, Y', strtotime($project->created_at))
                            }}</div>
                        <div class="col-sm-3 text-center text-color h4 py-2">{{
                            date('M j, Y', strtotime($project->updated_at))
                            }}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection