@extends('layouts.frontend.appbrowse')

@section('title')
Search Freelancer | {{ $query }} |
@endsection

@push('css')
    <link href="{{ asset('assets/frontend/css/category/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('assets/frontend/css/category/responsive.css') }}" rel="stylesheet">
    <style>
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

                        <div class="col-lg-3 col-md-4">
                            <div class="card h-100">
                                <div class="single-post post-style-1">
                                    <a  href="{{ route('browse.details',$project_owner->name) }}" title="{{substr($project_owner->name,0,13)}} | View Profile">
                                        <div class="blog-image" style="max-height: 100px;">
                                                    @if(Storage::disk('public')->exists('profile/'.$project_owner->image))
                                                        <img src="{{ Storage::disk('public')->url('profile/'.$project_owner->image)  }}"  alt="User" />
                                                    @else
                                                        <img src="{{  asset('assets/frontend/images/default.png') }}"  alt="User" />
                                                    @endif
                                        </div>
                                    </a>

                                    <a class="avatar" href="{{ route('browse.details',$project_owner->name) }}">
                                                @if(Storage::disk('public')->exists('profile/'.$project_owner->image))
                                                    <img src="{{ Storage::disk('public')->url('profile/'.$project_owner->image)  }}"  alt="User" />
                                                @else
                                                    <img src="{{  asset('assets/frontend/images/default.png') }}"  alt="User" />
                                                @endif

                                    </a>

                                    <div class="blog-info">
                                        <h4 class="title"><a href="{{ route('browse.details',$project_owner->name) }}"><b>{{substr($project_owner->name,0,13)}}</b></a></h4>
                                        
                                        <div class="row" style="padding-left:10px;padding-right:10px;">
                                            

                                            <div class="col-md-4"  style="margin-bottom:0px;">
                                             <img class="pull-right" src="{{  asset('assets/frontend/images/devskiller.png') }}" style="width:40px;height:40px;" alt="Passed Devskiller Skill Test"  
                                              title="Passed Devskiller Skill test"/>
                                            </div>

                                            <div class="col-md-4" style="margin-bottom:0px;"> 
                                                @if( $project_owner->specialty==1)
                                                    <span class="label label-primary">Developer</span>
                                                @elseif( $project_owner->specialty==2)
                                                    <span class="label label-info">Designer</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4"  style="margin-bottom:0px;">
                                            <p><strong>{{$project_owner->country}}</strong>&nbsp;<span>{{CountryFlag::get($project_owner->country)}}</span></p>
                                            </div>
                                        </div>    

                                        <p>Bio:
                                        <a class="date" href="#"><b>{{substr($project_owner->about,0,110)}}...</b></a></p>
                                        

                                        <br>
                                        <ul class="post-footer">
                                            @if($project_owner->facebook_url!=null)
                                                <li>
                                                <a href="{{$project_owner->facebook_url}}" target="_blank" class="fa fa-facebook" title="{{substr($project_owner->name,0,13)}} | Facebook"></a>
                                                </li>
                                            @endif    

                                            @if($project_owner->twitter_url!=null)
                                                <li>
                                                <a href="{{$project_owner->twitter_url}}" target="_blank" class="fa fa-twitter" title="{{substr($project_owner->name,0,13)}} | Twitter"></a>    
                                                </li>
                                            @endif      

                                            @if($project_owner->linkedin_url!=null)
                                                <li>
                                                <a href="{{$project_owner->linkedin_url}}" target="_blank" class="fa fa-linkedin" title="{{substr($project_owner->name,0,13)}} | LinkedIn"></a> 
                                                </li>
                                            @endif
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