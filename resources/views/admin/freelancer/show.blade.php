@extends('layouts.backend.app')

@section('title','Freelancers')

@push('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
@endpush

@push('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
    <a href="{{ route('admin.freelancer.index') }}" class="btn btn-danger waves-effect">BACK</a>

    @if( $freelancer->specialty==1)
      <span class="badge bg-green">Developer</span>
    @elseif( $freelancer->specialty==2)
      <span class="badge bg-green">Designer</span>
    @endif

    <br>
    <br>
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-blue">
                    <h2>
                        {{ $freelancer->name }}
                    </h2>
                    <p>{{ $freelancer->email }}</p>
                </div>
                <div class="header">
                    <h2>
                        SET VETTING INFO
                    </h2>

                </div>
                <div class="body">
                    <form action="{{ route('admin.freelancer.setvetinfo',$freelancer->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col clearfix">

                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="time" id="time" class="form-control" name="time"
                                            value="{{ $freelancer->vet_time }}" style="margin-top:5px;">
                                        <label class="form-label">Time</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="input-group input-append form-line date" id="datePicker">
                                        <input type="text" class="form-control" name="date"
                                            value="{{ $freelancer->vet_date}}" style="margin-top:5px;" />
                                        <span class="input-group-addon add-on"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                        <label class="form-label">Date</label>
                                    </div>
                                </div>
                            </div>
                            </div>

                            @if($freelancer->specialty==1)
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="vet_url" class="form-control" name="vet_url"
                                        value="{{ $freelancer->vet_url }}" style="margin-top:5px;">
                                    <label class="form-label">Test URL</label>
                                </div>
                            </div>
                            @endif
                          
                           
    
                            <div class="form-group">
                                <button class="btn btn-danger m-t-15 waves-effect pull-left" data-dismiss="modal">
                                    <i class="material-icons">cancel</i>
                                    <span>CANCEL</span>
                                </button>
                                <button type="submit" class="btn btn-success m-t-15 waves-effect pull-right">
                                    <i class="material-icons">done</i>
                                    <span>SUBMIT</span>
                                </button>
                            </div>
                        
                        </div>

                        
                    </form>
                </div>
            </div>



        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-cyan">
                    <h2>
                        Vetting State
                    </h2>
                </div>
                <div class="body">
                    @if($freelancer->status == true)
                        <span class="badge bg-blue">vetted</span>
                        @if($freelancer->is_accepted == true)
                          <span class="badge bg-green">Accepted</span>
                        @elseif($freelancer->is_accepted == false) 
                          <span class="badge bg-red">Rejected</span>
                        @endif 
                    @else
                        <span class="badge bg-red">not vetted</span>
                    @endif

                </div>
            </div>
            <div class="card">
                <div class="header bg-green">
                    <h2>
                        Meeting
                    </h2>
                </div>
                <div class="body">
                    @if($freelancer->vet_date!=null && $freelancer->vet_time!=null )
                    <span class="badge bg-blue">{{$freelancer->vet_date}}</span>
                    <span class="badge bg-green">GMT {{$freelancer->vet_time}}</span>
                    @else
                    <span class="badge bg-red">Meeting not set</span>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('js')
<!-- Select Plugin Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<!-- TinyMCE -->
<script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script>
    $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
        });
        function approvePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to approve this post ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approval-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The post remain pending :)',
                        'info'
                    )
                }
            })
            
        } 

</script>

<script>
    $(document).ready(function() {
            $('#datePicker')
                .datepicker({
                    format: 'yyyy/mm/dd'
                })
        
        });
</script>

@endpush