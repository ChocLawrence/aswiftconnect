@extends('layouts.frontend.appbrowse')

@section('title','Pofile')
@push('css')


	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

	<!-- Stylesheets -->
    <link href="{{ asset('assets/frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/single-post-2/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/single-post-2/responsive.css') }}" rel="stylesheet">
    <style>
            .slider {
                height: 400px;
                width: 100%;
                background-image: url({{ asset('assets/frontend/images/profile_back.jpg') }});
                background-size: cover;
            }
            .favorite_posts{
                color: blue;
            }
        </style>
@endpush

@section('content')
    <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b></b></h1>
    </div><!-- slider -->

    <section class="post-area">
            <div class="container">
    
                <div class="row">
    
                    <div class="col-lg-1 col-md-0"></div>
                    <div class="col-lg-10 col-md-12">
    
                        <div class="main-post">
    
                            <div class="post-top-area">
    
                                <h3 class="title"><a href="#"><b>{{$userInfo->name}}</b></a></h3>
    
                                <div class="post-info">
    
                                    <div class="left-area">
                                        <a class="avatar" href="#"><img src="{{asset('assets/frontend/images/avatar-1-120x120.jpg')}}" alt="Profile Image"></a>
                                    </div>
    
                                    <div class="middle-area">
                                        <a class="name" href="#"><b>{{$userInfo->name}}</b></a>
                                        <p>Country:<strong>{{$userInfo->country}}</strong></p>
                                        <h6 class="date">  | Joined {{$userInfo->created_at->toDateString()}}</h6>
                                        @if( $userInfo->specialty==1)
                                            <span class="badge bg-green">Developer</span>
                                        @elseif( $userInfo->specialty==2)
                                            <span class="badge bg-green">Designer</span>
                                        @endif
                                    </div>
    
                                </div><!-- post-info -->
                                <br>
                                <h5 class="pre-title">ABOUT</h5>

                                <p class="para">{{$userInfo->about}}</p>
    
                            </div><!-- post-top-area -->
{{--     
                            <div class="post-image"><img src="{{asset('assets/frontend/images/category-1.jpg')}}" alt="Blog Image" width="auto" height="200"></div>
     --}}
                            

                            <div class="post-bottom-area">
                                <br>
                                <h5 class="pre-title">PROJECTS({{$count}})</h5>

                                @foreach($all_projects as $a_project)

                                    <ul class="tags">
                                        <li><a href="#">{{$a_project->title}}</a></li>
                                    </ul>
        
                                    <p class="para">{{$a_project->description}}</p>
                                    <a href="{{$a_project->project_link}}" style="color:blue;" target="_blank">Project Link</a>

                                    <hr>
        
                                @endforeach
    
                                <div class="post-icons-area">
                                    {{-- <ul class="post-icons">
                                        <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                        <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>138</a></li>
                                    </ul> --}}
    
                                    <ul class="icons">
                                        <li>SOCIAL: </li>
                                       
                                        @if($userInfo->facebook_url!=null)
                                          <li><a href="{{$userInfo->facebook_url}}" target="_blank"><i class="ion-social-facebook"></i></a></li>
                                        @endif

                                        @if($userInfo->twitter_url!=null)
                                         <li><a href="{{$userInfo->twitter_url}}" target="_blank"><i class="ion-social-twitter"></i></a></li>
                                        @endif

                                        @if($userInfo->github_url!=null)
                                         <li><a href="{{$userInfo->github_url}}" target="_blank"><i class="ion-social-github"></i></a></li>
                                        @endif

                                        @if($userInfo->github_url!=null)
                                         <li><a href="{{$userInfo->linkedin_url}}" target="_blank"><i class="ion-social-linkedin"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
    
                            </div><!-- post-bottom-area -->
    
                        </div><!-- main-post -->
                    </div><!-- col-lg-8 col-md-12 -->
                </div><!-- row -->
            </div><!-- container -->
        </section><!-- post-area -->


@endsection

@push('js')
<!-- SCIPTS -->

<script src="{{ asset('assets/frontend/js/jquery-3.1.1.min.js') }}"></script>

<script src="{{ asset('assets/frontend/js/tether.min.js') }}"></script>

<script src="{{ asset('assets/frontend/js/bootstrap.js') }}"></script>

<script src="{{ asset('assets/frontend/js/scripts.js') }}"></script>
@endpush