@extends('layouts.frontend.app')

@section('title')
{{ $query }}
@endsection

@push('css')
    <link href="{{ asset('assets/frontend/css/category/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/category/responsive.css') }}" rel="stylesheet">
    <style>
            .slider {
                height: 400px;
                width: 100%;
                background-image: url({{ asset('assets/frontend/images/audrey-jackson-260657.jpg') }});
                background-size: cover;
            }
            .favorite_posts{
                color: blue;
            }
        </style>
@endpush

@section('content')
    <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><p style="color:white;"><strong>{{ $posts->count() }} Result{{$posts->count()>1 ?'s' : ''}} for {{ $query }}</strong></p></h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            @if(session()->has('message'))
                <div class="alert-box alert alert-success alert-dismissible">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session()->get('message')}}</strong>
                </div>
            @endif

            <div class="row">
                @if($posts->count() > 0)
                    @foreach($posts as $post)
                        <div class="col-lg-3 col-md-4">
                            <div class="card h-100">
                                <div class="single-post post-style-1">

                                    <div class="blog-image">
                                        @if(Storage::disk('public')->exists('post/'.$post->image))
                                          <img src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt="{{ $post->title }}">
                                        @else
                                          <img src="{{  asset('assets/frontend/images/post_default.jpg') }}"  alt="Project Default Image" />
                                        @endif
                                    </div>

                                    <a class="avatar" href="{{ route('author.profile',$post->user->username) }}">
                                        @if(Storage::disk('public')->exists('profile/'.$post->user->image))
                                          <img src="{{ Storage::disk('public')->url('profile/'.$post->user->image)  }}" width="48" height="48" alt="User" />
                                        @else
                                          <img src="{{  asset('assets/frontend/images/default.png') }}" width="48" height="48" alt="User" />
                                        @endif
                                    </a>

                                    <div class="blog-info">

                                        <h5 class="title"><a href="{{ route('post.details',$post->slug) }}" style="font-size: small"><b>{{ $post->title }}</b></a></h5>
                                        <div class="row">
                                            @if($post->is_paid==true)
                                                <span class="col label badge-inverse" style="color:white"><strong>$ {{$post->amount}}</strong></span>
                                                <span class="col label label-success" style="color:white"><strong>Paid</strong></span>
                                            @elseif($post->is_paid!=true)
                                                <span class="col label label-large label-pink" style="color:white"><strong>Unpaid</strong></span>
                                            @endif

                                            @if($post->assigned_to!=null)
                                                <span class="col label label-info" style="color:white"><strong>Assigned</strong></span>
                                                @if($post->is_completed==true)
                                                <span class="col label label-success" style="color:white"><strong>Completed</strong></span>
                                                @elseif($post->is_completed==false)
                                                    <span class="col label label-large label-grey" style="color:white"><strong>In Progress</strong></span>
                                                @endif
                                            @elseif($post->assigned_to==null)
                                                <span class="col label label-large label-grey" style="color:white"><strong>Unassigned</strong></span>
                                            @endif
                                        </div>

                                        <ul class="post-footer">

                                            <li>
                                                @guest
                                                    <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                        closeButton: true,
                                                        progressBar: true,
                                                    })"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>
                                                @else
                                                    <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();"
                                                       class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>

                                                    <form id="favorite-form-{{ $post->id }}" method="POST" action="{{ route('post.favorite',$post->id) }}" style="display: none;">
                                                        @csrf
                                                    </form>
                                                @endguest

                                            </li>
                                            <li><a href="#"><i class="ion-chatbubble"></i>{{ $post->comments->count() }}</a></li>
                                            <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                                        </ul>

                                    </div><!-- blog-info -->
                                </div><!-- single-post -->
                            </div><!-- card -->
                        </div><!-- col-lg-4 col-md-6 -->
                    @endforeach
                @else
                    <div class="col-lg-12 col-md-12">
                        <div class="card h-100">
                            <div class="single-post post-style-1">
                                <div class="blog-info">
                                    <h4 class="title">
                                        <strong>Sorry, No post found :(</strong>
                                    </h4>
                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endif


            </div><!-- row -->

            {{--{{ $posts->links() }}--}}

        </div><!-- container -->
    </section><!-- section -->

@endsection

@push('js')

@endpush
