@extends('layouts.frontend.app')

@section('title','Posts')

@push('css')
    <link href="{{ asset('assets/frontend/css/home/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/home/responsive.css') }}" rel="stylesheet">
    <style>
            .slider {
                height: 400px;
                width: 100%;
                background-image: url({{ asset('assets/frontend/images/category-1.jpg') }});
                background-size: cover;
            }
            .favorite_posts{
                color: blue;
            }
        </style>
@endpush

@section('content')
    <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>ALL POSTS</b></h1>
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
                @foreach($posts as $post)
                    <div class="col-lg-3 col-md-4">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt="{{ $post->title }}"></div>

                                <a class="avatar" href="{{ route('author.profile',$post->user->username) }}">
                                    @if(Storage::disk('public')->exists('profile/'.$post->user->image))
                                     <img src="{{ Storage::disk('public')->url('profile/'.$post->user->image)  }}" width="48" height="48" alt="User" />
                                    @else
                                     <img src="{{  asset('assets/frontend/images/default.png') }}" width="48" height="48" alt="User" />
                                    @endif
                                </a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="{{ route('post.details',$post->slug) }}" style="color:black;">{{ $post->title }}</a></h4>

                                    <div>
                                        @if($userId===1)
                                            @if($post->is_paid==true)
                                                <span class="label badge-inverse" style="float:left;color:white"><strong>$ {{$post->earning}}</strong></span>
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
                                        <li><a href="#"><i class="ion-chatbubble"></i>{{ $post->comments->count() }}</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforeach
            </div><!-- row -->

            {{ $posts->links() }}

        </div><!-- container -->
    </section><!-- section -->

@endsection

@push('js')

@endpush