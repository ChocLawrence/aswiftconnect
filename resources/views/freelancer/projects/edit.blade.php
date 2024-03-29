@extends('layouts.backend.app')

@section('title','Edit Project')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">

        <a href="{{ route('freelancer.projects.index') }}" class="btn btn-danger waves-effect">BACK</a>
        <br>
        <br>
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('freelancer.projects.update',$current_project->id) }}"  method="POST">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                   EDIT PROJECT
                                </h2>
                            </div>
                            <div class="body">
                                    <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="title">Title: </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="title" class="form-control" placeholder="Enter your title" name="title" value="{{ $current_project->title }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="project_link">Project Link</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="project_link" class="form-control" placeholder="Enter your project URL" name="project_link" value="{{ $current_project->project_link }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="description">Description: </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <textarea rows="5" name="description" class="form-control" >{{ $current_project->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
    
                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE PROJECT</button>
                                            </div>
                                        </div>
    
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    project Stats
                                </h2>
                            </div>
                            <div class="body">
                                
    
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection

@push('js')
   

@endpush