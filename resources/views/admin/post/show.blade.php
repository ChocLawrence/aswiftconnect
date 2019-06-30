@extends('layouts.backend.app')

@section('title','Post')

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
    <a href="{{ route('admin.post.index') }}" class="btn btn-danger waves-effect">BACK</a>
    @if($post->amount!==null)

        @if($post->is_approved == true)

            @if($post->is_paid==true)

                @if($post->assigned_to!=null)
                  <span class="badge bg-green">Assigned</span>
                @else
                   <span class="badge bg-red">Unassigned</span>
                @endif
              
                <a class="btn btn-default waves-effect">Cost: <strong>${{ $post->amount }}</strong></a>
                <span class="badge bg-green">Paid</span>
                <span class="badge bg-green">Approved</span>
                <span class="badge bg-blue">{{ $post->is_completed ? 'Completed' : 'Not Completed' }}</span>

                @if($post->is_completed==true)
                    <span class="incomplete pull-right">
                        <button type="button" class="btn btn-danger waves-effect" onclick="markInComplete({{ $post->id }})">
                            <i class="material-icons">cancel</i>
                            <span>Mark InComplete</span>
                        </button>
                        <form method="post" action="{{ route('admin.post.incomplete',$post->id) }}" id="incomplete-form-{{ $post->id }}"
                            style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>
                    </span>
                @elseif($post->is_completed==false && $post->assigned_to!=null)

                    <span class="complete pull-right" style="margin-right: 10px;">
                        <button type="button" class="btn btn-success waves-effect" onclick="markComplete({{ $post->id }})">
                            <i class="material-icons">done</i>
                            <span>Mark Complete</span>
                        </button>
                        <form method="post" action="{{ route('admin.post.complete',$post->id) }}" id="complete-form-{{ $post->id }}"
                            style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>
                    </span>&nbsp;

                    <span class="incomplete pull-right">
                        <button type="button" class="btn btn-danger waves-effect" onclick="markInComplete({{ $post->id }})">
                            <i class="material-icons">cancel</i>
                            <span>Mark InComplete</span>
                        </button>
                        <form method="post" action="{{ route('admin.post.incomplete',$post->id) }}" id="incomplete-form-{{ $post->id }}"
                            style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>
                    </span>&nbsp;

                @endif



            @elseif($post->is_paid==false)

              <a class="btn btn-default waves-effect">Cost: <strong>${{ $post->amount }}</strong></a>
              <span class="badge bg-red">Unpaid</span>


            @endif
        
        @elseif($post->is_approved == false)
            <button type="button" class="btn btn-success waves-effect pull-right" onclick="approvePost({{ $post->id }})">
                <i class="material-icons">done</i>
                <span>Approve</span>
            </button>
            <form method="post" action="{{ route('admin.post.approve',$post->id) }}" id="approval-form-{{ $post->id }}"
                style="display: none;">
                @csrf
                @method('PUT')
            </form>

        @endif

       
    @elseif($post->amount===null)

        <a class="btn btn-info waves-effect" data-toggle="modal" data-backdrop="static" data-keyboard="false"
            data-target="#setInvoiceModal">
            <i class="material-icons">assignment</i>
            <span>Set Invoice</span>
        </a>

    @endif


    <br>
    <br>
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-black">
                    <h2>
                        @if($post->assigned_to!=null)
                        Assigned To <strong>{{$assignedFreelancer->name}}</strong> <span class="bg-green"
                            style="font-size: 12px; padding:5px;">{{$assignedFreelancer->id}}</span>
                        @elseif($post->assigned_to==null)
                        Post
                        @endif
                    </h2>
                </div>
                <div class="header">
                    <h2>
                        {{ $post->title }}
                        <small>Posted By <strong> <a href="">{{ $post->user->name }}</a></strong> on
                            {{ $post->created_at->toFormattedDateString() }}</small>
                    </h2>
                </div>
                <div class="body">
                    {!! $post->body !!}
                </div>
            </div>

            <!-- Exportable Table -->
            @if($post->is_paid==true)
                @if($post->is_approved == true)
                    @if($post->assigned_to==null)
                    <div class="card">
                        <div class="header">
                            <h2>
                                UNASSIGNED FREELANCERS
                                <span class="badge bg-blue">{{ $freelancers->count() }}</span>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($freelancers as $key=>$freelancer)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $freelancer->name }}</td>
                                            <td> <span
                                                    class="badge bg-blue">{{ $freelancer->id==$post->assigned_to ? 'Assigned' : 'No' }}</span>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-success waves-effect"
                                                    onclick="assignPost({{ $freelancer->id }})">
                                                    <i class="material-icons">check_circle</i>
                                                    <span>ASSIGN</span>
                                                </button>
                                                <form method="post"
                                                    action="{{ route('admin.post.assign',[$post->id,$freelancer->id]) }}"
                                                    id="assign-form-{{ $freelancer->id }}" style="display:none;">
                                                    @csrf
                                                    @method('PUT')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    @endif
                @endif
            @endif
            <!-- #END# Exportable Table -->

        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-cyan">
                    <h2>
                        Categoryies
                    </h2>
                </div>
                <div class="body">
                    @foreach($post->categories as $category)
                    <span class="label bg-cyan">{{ $category->name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="header bg-green">
                    <h2>
                        Tags
                    </h2>
                </div>
                <div class="body">
                    @foreach($post->tags as $tag)
                    <span class="label bg-green">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="header bg-amber">
                    <h2>
                        Featured Image
                    </h2>
                </div>
                <div class="body">
                    <img class="img-responsive thumbnail" src="{{ Storage::disk('public')->url('post/'.$post->image) }}"
                        alt="">
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="setInvoiceModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background: orange">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
                        class="ion-android-close"></span></button>
                <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">SET INVOICE
                </h4>
            </div> <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{ route('admin.post.setinvoice',$post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        Post Title: {{ $post->title }}
                                    </h2>
                                </div>
                                <div class="body">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="amount" class="form-control" name="amount"
                                                value="{{ $post->amount }}">
                                            <label class="form-label">Cost</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="input-group input-append form-line date" id="datePicker">
                                            <input type="text" class="form-control" name="deadline"
                                                value="{{ $post->deadline}}" style="margin-top:10px;" />
                                            <span class="input-group-addon add-on"><span
                                                    class="glyphicon glyphicon-calendar"></span></span>
                                            <label class="form-label">Deadline</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-danger m-t-15 waves-effect pull-left"
                                            data-dismiss="modal">
                                            <i class="material-icons">cancel</i>
                                            <span>CANCEL</span>
                                        </button>
                                        <button type="submit" class="btn btn-success m-t-15 waves-effect pull-right">
                                            <i class="material-icons">done</i>
                                            <span>SUBMIT</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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

        function assignPost(freelancerid) {
            swal({
                title: 'Are you sure?',
                text: "You want to Assign this project",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, assign freelancer!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('assign-form-'+ freelancerid).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Freelancer not assigned :)',
                        'info'
                    )
                }
            })
            
        }


        function markComplete(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to mark this Job as completed ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, mark complete!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('complete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Job not marked complete:)',
                        'info'
                    )
                }
            })
            
        }

        function markInComplete(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to mark this Job as not Completed ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, mark InComplete!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('incomplete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Job not marked Incomplete:)',
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