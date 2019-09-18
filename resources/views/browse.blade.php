@extends('layouts.frontend.appbrowse')

@section('title')
Search Freelancer | {{ $query }} |
@endsection

@push('css')
    <link href="{{ asset('assets/frontend/css/category/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('assets/frontend/css/category/responsive.css') }}" rel="stylesheet">
    <style>

        

.card {
    padding-top: 20px;
    margin: 10px 0 20px 0;
    background-color: rgba(214, 224, 226, 0.2);
    border-top-width: 0;
    border-bottom-width: 2px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card .card-heading {
    padding: 0 20px;
    margin: 0;
}

.card .card-heading.simple {
    font-size: 20px;
    font-weight: 300;
    color: #777;
    border-bottom: 1px solid #e5e5e5;
}

.card .card-heading.image img {
    display: inline-block;
    width: 46px;
    height: 46px;
    margin-right: 15px;
    vertical-align: top;
    border: 0;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
}

.card .card-heading.image .card-heading-header {
    display: inline-block;
    vertical-align: top;
}

.card .card-heading.image .card-heading-header h3 {
    margin: 0;
    font-size: 14px;
    line-height: 16px;
    color: #262626;
}

.card .card-heading.image .card-heading-header span {
    font-size: 12px;
    color: #999999;
}

.card .card-body {
    padding: 0 20px;
    margin-top: 20px;
}

.card .card-media {
    padding: 0 20px;
    margin: 0 -14px;
}

.card .card-media img {
    max-width: 100%;
    max-height: 100%;
}

.card .card-actions {
    min-height: 30px;
    padding: 0 20px 20px 20px;
    margin: 20px 0 0 0;
}

.card .card-comments {
    padding: 20px;
    margin: 0;
    background-color: #f8f8f8;
}

.card .card-comments .comments-collapse-toggle {
    padding: 0;
    margin: 0 20px 12px 20px;
}

.card .card-comments .comments-collapse-toggle a,
.card .card-comments .comments-collapse-toggle span {
    padding-right: 5px;
    overflow: hidden;
    font-size: 12px;
    color: #999;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.card-comments .media-heading {
    font-size: 13px;
    font-weight: bold;
}

.card.people {
    position: relative;
    display: inline-block;
    width: 170px;
    height: 300px;
    padding-top: 0;
    margin-left: 20px;
    overflow: hidden;
    vertical-align: top;
}

.card.people:first-child {
    margin-left: 0;
}

.card.people .card-top {
    position: absolute;
    top: 0;
    left: 0;
    display: inline-block;
    width: 170px;
    height: 150px;
    background-color: #ffffff;
}

.card.people .card-top.green {
    background-color: #53a93f;
}

.card.people .card-top.blue {
    background-color: #427fed;
}

.card.people .card-info {
    position: absolute;
    top: 150px;
    display: inline-block;
    width: 100%;
    height: 101px;
    overflow: hidden;
    background: #ffffff;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card.people .card-info .title {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 16px;
    font-weight: bold;
    line-height: 18px;
    color: #404040;
}

.card.people .card-info .desc {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 12px;
    line-height: 16px;
    color: #737373;
    text-overflow: ellipsis;
}

.card.people .card-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    display: inline-block;
    width: 100%;
    padding: 10px 20px;
    line-height: 29px;
    text-align: center;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: rgba(214, 224, 226, 0.2);
}

.card.hovercard .cardheader {
    background: url("http://lorempixel.com/850/280/nature/4/");
    background-size: cover;
    height: 135px;
}

.card.hovercard .avatar {
    position: relative;
    top: -50px;
    margin-bottom: -50px;
}

.card.hovercard .avatar img {
    width: 100px;
    height: 100px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.5);
}

.card.hovercard .info {
    padding: 4px 8px 10px;
}

.card.hovercard .info .title {
    margin-bottom: 4px;
    font-size: 24px;
    line-height: 1;
    color: #262626;
    vertical-align: middle;
}

.card.hovercard .info .desc {
    overflow: hidden;
    font-size: 12px;
    line-height: 20px;
    color: #737373;
    text-overflow: ellipsis;
}

.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}

.btn{ border-radius: 50%; width:32px; height:32px; line-height:18px;  }

            .slider {
                height: 400px;
                width: 100%;
                background-image: url({{ asset('assets/frontend/images/audrey-jackson-260657.jpg') }});
                background-size: cover;
            }
            .favorite_project_owners{
                color: blue;
            }

            .orange{
                color:orange;
            }
            .skill{
                padding:1px;
            }

        </style>
@endpush

@section('content')
    <div class="slider display-table center-text">
        <h2 class="title display-table-cell"><p style="color:white;"><strong>Browse Africa's Tech & Design Talent</strong></p></h2>
        {{-- @if(!$query)
        <h4 class="title display-table-cell"><p style="color:white;"><strong>{{ $project_owners->count() }} freelancer{{$project_owners->count()>1 ?'s' : ''}} found </strong></p></h4>
        @else
          <h4 class="title display-table-cell"><p style="color:white;"><strong>{{ $project_owners->count() }} Result{{$project_owners->count()>1 ?'s' : ''}} for {{ $query }}</strong></p></h4>
        @endif --}}
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
                @if($project_owners->count() > 0)
                    @foreach($project_owners as $project_owner)

                    <div class="col-lg-3 col-sm-6">

                        <div class="card hovercard">
                            <div class="cardheader">
                            </div>
                            <div class="avatar">
                                @if(Storage::disk('public')->exists('profile/'.$project_owner->image))
                                    <img src="{{ Storage::disk('public')->url('profile/'.$project_owner->image)  }}"  alt="User" />
                                @else
                                    <img src="{{  asset('assets/frontend/images/default.png') }}"  alt="User" />
                                @endif
                                
                            </div>
                            <div class="info">
                                <div class="title">
                                    <strong><a  href="{{ route('browse.details',$project_owner->name) }}">{{substr($project_owner->name,0,13)}}</a></strong>
                                </div>
                                <div class="row">
                                    <div class="col" style="margin-bottom:0px;">
                                        <img src="{{  asset('assets/frontend/images/devskiller.png') }}" style="width:40px;height:40px;" alt="Passed Devskiller Skill Test"  
                                              title="Passed Devskiller Skill test"/>
                                    </div>
                                    <div class="col" style="margin-bottom:0px;">
                                            @if( $project_owner->specialty==1)
                                                <span class="badge label-primary">Developer</span>
                                            @elseif( $project_owner->specialty==2)
                                                <span class="badge label-success">Designer</span>
                                            @endif
                                    </div>
                                    <div class="col" style="margin-bottom:0px;">
                                      <p><strong>{{$project_owner->country}}</strong>&nbsp;<span>{{CountryFlag::get($project_owner->country)}}</span></p>
                                    </div>
                                </div>
                                <div class="skill">
                                    @if(count($project_owner['skills'])>0)
                                        @foreach($project_owner['skills'] as $skill)
                                            <span class="badge  label-default">{{$skill->title}}</span>
                                        @endforeach   
                                    @endif
                                </div>
                            </div>
                            <b><p style="font-size:12px;">Bio:{{substr($project_owner->about,0,110)}}...</p></b>
                            <div class="bottom">

                                @if($project_owner->github_url!=null)
                                    <a class="btn btn-primary btn-github btn-sm" rel="publisher"
                                    href="{{$project_owner->github_url}}" target="_blank">
                                        <i class="fa fa-github"></i>
                                    </a>
                                @endif

                                @if($project_owner->twitter_url!=null)
                                    <a class="btn btn-primary btn-twitter btn-sm"
                                    href="{{$project_owner->twitter_url}}" target="_blank">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                @endif  

                                @if($project_owner->linkedin_url!=null)
                                    <a class="btn btn-danger btn-linkedin btn-sm" rel="publisher"
                                    href="{{$project_owner->linkedin_url}}" target="_blank">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                @endif  

                                @if($project_owner->facebook_url!=null)
                                    <a class="btn btn-primary btn-sm" rel="publisher"
                                    href="{{$project_owner->facebook_url}}" target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                @endif  
                                
                                

                            </div>
                        </div>

                    </div>

                    @endforeach
                @else
                    <div class="col-lg-12 col-md-12">
                        <div class="card h-100">
                            <div class="single-post post-style-1">
                                <div class="blog-info">
                                    <h4 class="title" style="padding-top:20px;">
                                        <strong>Sorry, No freelancer found :(</strong>
                                    </h4>
                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endif


            </div>
            
            <!-- row -->

            {{--{{ $project_owners->links() }}--}}

        </div><!-- container -->
    </section><!-- section -->

@endsection

@push('js')

@endpush