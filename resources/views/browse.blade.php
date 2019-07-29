@extends('layouts.frontend.appbrowse')

@section('title','Browse Freelancers')
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
            .favorite_project_owners{
                color: blue;
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
                                <div class="single-post post-style-2">
                                    <div class="blog-info">
                                        <div class="avatar-area">
                                            <a class="avatar"href="{{ route('browse.details',$project_owner->name) }}">
                                                @if(Storage::disk('public')->exists('profile/'.$project_owner->image))
                                                    <img src="{{ Storage::disk('public')->url('profile/'.$project_owner->image)  }}" width="70" height="70" alt="User" />
                                                @else
                                                    <img src="{{  asset('assets/frontend/images/default.png') }}" width="70" height="70" alt="User" />
                                                @endif
                                            </a>
                                            <div class="right-area">
                                                <a class="name" href="#"><b>{{$project_owner->name}}</b></a><br>
                                                @if( $project_owner->specialty==1)
                                                    <span class="badge bg-green">Developer</span>
                                                @elseif( $project_owner->specialty==2)
                                                    <span class="badge bg-green">Designer</span>
                                                @endif
                                                <p>Bio:</p>
                                                <a class="date" href="#"><b>{{substr($project_owner->about,0,20)}}...</b></a>
                                            </div>
                                        </div>
                                    </div>

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