@extends('layouts.backend.app')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL ASSIGNED</div>
                    <div class="number count-to" data-from="0" data-to="{{ $assigned }}" data-speed="15"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">favorite</i>
                </div>
                <div class="content">
                    <div class="text">FAVORITES</div>
                    <div class="number count-to" data-from="0" data-to="{{ Auth::user() ->favorite_posts()->count()}}"
                        data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">library_books</i>
                </div>
                <div class="content">
                    <div class="text">COMPLETED</div>
                    <div class="number count-to" data-from="0" data-to="{{$complete}}" data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">INCOMPLETE</div>
                    <div class="number count-to" data-from="0" data-to="{{$incomplete}}" data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->


    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
            <div class="info-box bg-blue hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">attach_money</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL EARNINGS</div>
                    <div class="number count-to" data-from="0" data-to="{{ $earnings }}" data-speed="15"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
            <div class="card">
                <div class="header">
                    <h2>TOP 10 POPULAR POSTS</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>Rank List</th>
                                    <th>Title</th>
                                    <th>Views</th>
                                    <th>Favorite</th>
                                    <th>Comments</th>
                                    <th>Status</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($popular_posts as $key=>$post)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ str_limit($post->title,30) }}</td>
                                    <td>{{ $post->view_count }}</td>
                                    <td>{{ $post->favorite_to_users_count }}</td>
                                    <td>{{ $post->comments_count }}</td>
                                    <td>
                                        @if($post->status == true)
                                        <span class="label bg-green">Published</span>
                                        @else
                                        <span class="label bg-red">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary waves-effect" target="_blank"
                                            href="{{ route('post.details',$post->slug) }}">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->

    </div>
</div>
@endsection

@push('js')
<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('assets/backend/plugins/jquery-countto/jquery.countTo.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/index.js') }}"></script>
@endpush