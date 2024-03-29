@extends('layouts.frontend.app')

@section('title')
{{ $post->title }}
@endsection

@push('css')
    <link href="{{ asset('assets/frontend/css/single-post/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/single-post/responsive.css') }}" rel="stylesheet">
    <style>
        .header-bg{
            height: 400px;
            width: 100%;
            background-image: url({{ Storage::disk('public')->url('post/'.$post->image) }}),url({{  asset('assets/frontend/images/post_default.jpg') }});
            background-size: cover;
        }
        .favorite_posts{
            color: blue;
        }
    </style>
@endpush

@section('content')
    <div class="header-bg">
    </div><!-- slider -->

    <section class="post-area section">
        <div class="container">

            @if(session()->has('message'))
                <div class="alert-box alert alert-success alert-dismissible">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session()->get('message')}}</strong>
                </div>
            @endif

            <div class="row">

                <div class="col-lg-8 col-md-12 no-right-padding">

                    <div class="main-post">

                        <div class="blog-post-inner">

                            <div class="post-info">

                                <div class="left-area">
                                    <a class="avatar" href="{{ route('author.profile',$post->user->username) }}">
                                           @if(Storage::disk('public')->exists('profile/'.$post->user->image))
                                             <img src="{{ Storage::disk('public')->url('profile/'.$post->user->image)  }}" width="48" height="48" alt="User" />
                                           @else
                                             <img src="{{  asset('assets/frontend/images/default.png') }}" width="48" height="48" alt="User" />
                                           @endif
                                    </a>
                                </div>

                                <div class="middle-area">
                                    <a class="name" href="#"><b>{{ $post->user->name }}</b></a>
                                    <h6 class="date">on {{ $post->created_at->diffForHumans() }}</h6>
                                </div>

                            </div><!-- post-info -->

                            <h3 class="title"><a href="#"><b>{{ $post->title }}</b></a></h3>

                            <div class="para">
                                {!! html_entity_decode($post->body) !!}
                            </div>

                            <ul class="tags">
                                @foreach($post->tags as $tag)
                                    <li><a href="{{ route('tag.posts',$tag->slug) }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- blog-post-inner -->

                        <div class="post-icons-area">
                            <ul class="post-icons">
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

                            <ul class="icons">
                                <li>SHARE : </li>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&display=popup" target="_blank"><i class="ion-social-facebook-outline"></i></a></li>
                                <li><a href="https://twitter.com/share?url={{url()->current()}}" target="_blank"><i class="ion-social-twitter-outline"></i></a></li>
                                {{-- <li><a href="https://www.instagram.com/aswiftconnect/" target="_blank"><i class="ion-social-instagram-outline"></i></a></li> --}}
                            </ul>
                        </div>


                    </div><!-- main-post -->
                </div><!-- col-lg-8 col-md-12 -->

                <div class="col-lg-4 col-md-12 no-left-padding">

                    <div class="single-post info-area">

                        <div class="sidebar-area about-area">
                            <h4 class="title"><b>ABOUT AUTHOR</b></h4>
                            <p><strong>{{ $post->user->country}}<strong>&nbsp;{{CountryFlag::get($post->user->country)}}</p>
                            <p>Bio:&nbsp;{{ $post->user->about }}</p>
                        </div>

                        <div class="tag-area">

                            <h4 class="title"><b>CATEGORIES</b></h4>
                            <ul>
                                @foreach($post->categories as $category)
                                    <li><a href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>

                        </div><!-- subscribe-area -->

                    </div><!-- info-area -->

                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- post-area -->


   

    <section class="comment-section">
        <br><br>
        <div class="container">
            <h4><b>POST COMMENT</b></h4>
            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="comment-form">
                        @guest
                            <p>For post a new comment. You need to login first. <a href="{{ route('login') }}">Login</a></p>
                        @else
                            <form method="post" action="{{ route('comment.store',$post->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea name="comment" rows="2" class="text-area-messge form-control"
                                                  placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
                                    </div><!-- col-sm-12 -->
                                    <div class="col-sm-12">
                                        <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                                    </div><!-- col-sm-12 -->

                                </div><!-- row -->
                            </form>
                        @endguest
                    </div><!-- comment-form -->

                    <h4><b>COMMENTS({{ $post->comments()->count() }})</b></h4>
                    @if($post->comments->count() > 0)
                        @foreach($post->comments as $comment)
                            <div class="commnets-area ">

                                <div class="comment">

                                    <div class="post-info">

                                        <div class="left-area">
                                            <a class="avatar" href="#">
                                                @if(Storage::disk('public')->exists('profile/'.$comment->user->image))
                                                    <img src="{{ Storage::disk('public')->url('profile/'.$comment->user->image)  }}" alt="Profile Image" />
                                                @else
                                                    <img src="{{  asset('assets/frontend/images/default.png') }}" alt="Profile Default Image" />
                                                @endif
                                            </a>
                                        </div>

                                        <div class="middle-area">
                                            <a class="name" href="#"><b>{{ $comment->user->name }}</b></a>
                                            <h6 class="date">on {{ $comment->created_at->diffForHumans()}}</h6>
                                        </div>

                                    </div><!-- post-info -->

                                    <p>{{ $comment->comment }}</p>

                                </div>

                            </div><!-- commnets-area -->
                        @endforeach
                    @else

                    <div class="commnets-area ">

                        <div class="comment">
                            <p>No Comment yet. Be the first :)</p>
                    </div>
                    </div>

                    @endif

                </div><!-- col-lg-8 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section>

    <section class="recomended-area section">
            <div class="container">
                <div class="row">
                    @foreach($randomposts as $randompost)
                        <div class="col-lg-3 col-md-4">
                            <div class="card h-100">
                                <div class="single-post post-style-1">
    
                                    <div class="blog-image">
                                        @if(Storage::disk('public')->exists('post/'.$randompost->image))
                                          <img src="{{ Storage::disk('public')->url('post/'.$randompost->image) }}"  alt="{{ $randompost->title }}">
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
    
                                        <h4 class="title"><a href="{{ route('post.details',$randompost->slug) }}"><b>{{ $randompost->title }}</b></a></h4>
    
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
                                                    })"><i class="ion-heart"></i>{{ $randompost->favorite_to_users->count() }}</a>
                                                @else
                                                    <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $randompost->id }}').submit();"
                                                       class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$randompost->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>
    
                                                    <form id="favorite-form-{{ $randompost->id }}" method="POST" action="{{ route('post.favorite',$randompost->id) }}" style="display: none;">
                                                        @csrf
                                                    </form>
                                                @endguest
    
                                            </li>
                                            <li><a href="#"><i class="ion-chatbubble"></i>{{ $randompost->comments->count() }}</a></li>
                                            <li><a href="#"><i class="ion-eye"></i>{{ $randompost->view_count }}</a></li>
                                        </ul>
    
                                    </div><!-- blog-info -->
                                </div><!-- single-post -->
                            </div><!-- card -->
                        </div><!-- col-lg-4 col-md-6 -->
                    @endforeach
                </div><!-- row -->
    
            </div><!-- container -->
        </section>


@endsection

@push('js')

@endpush