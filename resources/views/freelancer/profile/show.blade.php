@extends('layouts.backend.app')

@section('title','Post')

@push('css')
<link href="{{ asset('assets/backend/css/dropdown.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->

    <a href="{{ route('freelancer.profile.index') }}" class="btn btn-danger waves-effect">BACK</a>

    <!--end approval check -->
    <br>
    <br>
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Title: {{$current_project->title}}
                    </h2>
                </div>
                <div class="body">
                       <h4>Project Link:</h4> {{$current_project->project_link}}
                       <br>
                       <h4>Description : </h4>{{$current_project->description}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-cyan">
                    <h2>
                        Stats
                    </h2>
                    <div id="data"></div>
                </div>
                <div class="body">
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
