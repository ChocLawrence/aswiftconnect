@extends('layouts.frontend.app')

@section('title','Profile')
@push('css')
    <link href="{{ asset('assets/frontend/css/home/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/home/responsive.css') }}" rel="stylesheet">
    <style>
            .slider {
                height: 400px;
                width: 100%;
                background-image: url({{ asset('assets/frontend/images/category-3-400x250.jpg') }});
                background-size: cover;
            }
            .favorite_posts{
                color: blue;
            }
        </style>
@endpush

@section('content')
    <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>{{ $author->name }}</b></h1>
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

                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        @if($posts->count() > 0)
                            @foreach($posts as $post)
                            <div class="col-md-4 col-sm-6">
                                <div class="card h-100">
                                    <div class="single-post post-style-1">

                                        <div class="blog-image">
                                            @if(Storage::disk('public')->exists('post/'.$post->image))
                                              <img src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt="{{ $post->title }}">
                                            @else
                                              <img src="{{  asset('assets/frontend/images/post_default.jpg') }}"  alt="Project Default Image" />
                                            @endif
                                        </div>

                                        <a class="avatar" href="#">
                                            @if(Storage::disk('public')->exists('profile/'.$post->user->image))
                                             <img src="{{ Storage::disk('public')->url('profile/'.$post->user->image)  }}" width="48" height="48" alt="User" />
                                            @else
                                             <img src="{{  asset('assets/frontend/images/default.png') }}" width="48" height="48" alt="User" />
                                            @endif
                                        </a>

                                        <div class="blog-info">

                                            <h4 class="title"><a href="{{ route('post.details',$post->slug) }}">{{ $post->title }}</a></h4>
                                            <div>
                                                @if($userId===1)
                                                    @if($post->is_paid==true)
                                                        <span class="label badge-inverse" style="float:left;color:white"><strong>$ {{$post->amount}}</strong></span>
                                                        <span class="label label-success" style="float:right;color:white"><strong>Paid</strong></span>
                                                    @elseif($post->is_paid!=true)
                                                        <span class="label label-large label-pink" style="float:right;color:white"><strong>Unpaid</strong></span>
                                                    @endif 
            
                                                    @if($post->assigned_to!=null)
                                                        <span class="label label-info" style="float:right;color:white"><strong>Assigned</strong></span>
                                                        @if($post->is_completed==true)
                                                        <span class="label label-success" style="float:right;color:white"><strong>Completed</strong></span>
                                                        @elseif($post->is_completed==false)
                                                            <span class="label label-large label-grey" style="float:right;color:white"><strong>In Progress</strong></span>
                                                        @endif
                                                    @elseif($post->assigned_to==null)
                                                        <span class="label label-large label-grey" style="float:right;color:white"><strong>Unassigned</strong></span>
                                                    @endif
                                                @else
                                    
                                                    @if($post->is_completed==true)
                                                    <span class="label label-success"
                                                        style="float:right;color:white"><strong>Completed</strong></span>
                                                    @endif
                                                 
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
                                                <li>
                                                    <a href="#"><i class="ion-chatbubble"></i>{{ $post->comments->count() }}</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a>
                                                </li>
                                            </ul>

                                        </div><!-- blog-info -->
                                    </div><!-- single-post -->
                                </div><!-- card -->
                            </div><!-- col-lg-4 col-md-6 -->
                        @endforeach
                        @else
                            <div class="col-md-6 col-sm-12">
                                <div class="card h-100">
                                    <div class="single-post post-style-1">
                                        <div class="blog-info">
                                            <h4 class="title">
                                                <strong>Sorry, No post found :(</strong>
                                            </h4>
                                        </div><!-- blog-info -->
                                    </div><!-- single-post -->
                                </div><!-- card -->
                            </div><!-- col-md-6 col-sm-12 -->
                        @endif

                    </div><!-- row -->

                    {{--<a class="load-more-btn" href="#"><b>LOAD MORE</b></a>--}}

                </div><!-- col-lg-8 col-md-12 -->

                <div class="col-lg-4 col-md-12 " style="position: relative; ">

                    <div class="single-post info-area ">

                        <div class="about-area">
                            <h4 class="title"><b>ABOUT AUTHOR</b></h4>
                            <p>{{ $author->name }}</p><br>
                            <p>{{ $author->about }}</p><br>
                            <p>Country:&nbsp;<strong>{{ $countryName }}</strong>&nbsp;{{$countryFlag}}</p><br>
                            <p><strong>Author Since: </strong>{{ $author->created_at->toDateString() }}</p><br>
                            <p><strong>Total Posts : </strong> {{ $author->posts->count() }}</p>
                            <div class="icons" style="position: absolute; 
                            bottom: 0;padding:10px;float:right;">
                                <ul  style="font-size:20px;">
                                   
                                    @if($author->facebook_url!=null)
                                      <li><a href="{{$author->facebook_url}}" target="_blank"><i class="ion-social-facebook"></i></a></li>
                                    @endif
                                    &nbsp;
                                    @if($author->twitter_url!=null)
                                     <li><a href="{{$author->twitter_url}}" target="_blank"><i class="ion-social-twitter"></i></a></li>
                                    @endif
                                    &nbsp;
                                    @if($author->github_url!=null)
                                     <li><a href="{{$author->github_url}}" target="_blank"><i class="ion-social-github"></i></a></li>
                                    @endif
                                    &nbsp;
                                    @if($author->github_url!=null)
                                     <li><a href="{{$author->linkedin_url}}" target="_blank"><i class="ion-social-linkedin"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>


                    </div><!-- info-area -->

                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- section -->


@endsection

@push('js')

@endpush