@extends('layouts.backend.app')

@section('title','Post')

@push('css')
<link href="{{ asset('assets/backend/css/dropdown.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->

    <a href="{{ route('author.post.index') }}" class="btn btn-danger waves-effect">BACK</a>
    
    <!-- check if project has been approved or not-->

    @if($post->is_approved == false)

      <div class="pull-right">
            <a class="btn btn-success waves-effect">
                <i class="material-icons">cancel</i>
                <span>unApproved</span>
            </a>
      </div>


    @elseif($post->is_approved == true)

        @if($post->amount !== null)
        <a class="btn btn-default waves-effect">Project Cost: <strong>${{ $post->amount }}</strong></a>
        @endif

        @if($post->is_paid == false)
        <div class="pull-right">
            <div class="dropdown">
                <button type="button" class="btn bg-blue waves-effect dropbtn">
                    <i class="material-icons">payment</i>
                    <span>Make Payment</span>
                </button>&nbsp;
                <div class="dropdown-content">
                    <div id="paypal-button-container"></div>
                </div>
            </div>


            <a class="btn btn-danger waves-effect pull-right" title="Awaiting approval so you can make a payment">
                <i class="material-icons">cancel</i>
                <span>UnApproved</span>
            </a>
        </div>
        @elseif($post->is_paid == true)

            <div class="pull-right">
                <div class="dropdown" style="display:none;">
                        <button type="button" class="btn bg-blue waves-effect dropbtn">
                            <i class="material-icons">payment</i>
                            <span>Make Payment</span>
                        </button>
                        <div class="dropdown-content">
                            <div id="paypal-button-container"></div>
                        </div>
                </div>
                <a class="btn btn-warning waves-effect" title="This project has been paid for">
                    <i class="material-icons">payment</i>
                    <span>PAID</span>
                </a>
                <a class="btn btn-success waves-effect">
                    <i class="material-icons">done</i>
                    <span>Approved</span>
                </a>
                         
            </div>
            @if($post->assigned_to!=null)
            <span class="badge bg-green">Assigned</span>
            @else
            <span class="badge bg-red">Unassigned</span>
            @endif
    
            <span class="badge bg-blue">{{ $post->is_completed ? 'Completed' : 'In progress' }}</span>

        @endif

    @endif

    <!--end approval check -->
    <br>
    <br>
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
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
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-cyan">
                    <h2>
                        Categoryies
                    </h2>
                    <div id="data"></div>
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
@endsection

@push('js')

<!-- Select Plugin Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<!-- TinyMCE -->
<script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>

<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
    function deletePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
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
                    document.getElementById('approval-form-'+ id).submit();
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
</script>

<script
    src="https://www.paypal.com/sdk/js?client-id=AXM_okiMmzTT4D0Dpsu51pxqWU5syXebJcOyjVqHl4Vpjp5BuCw8VZLUF6L0cD2xB4Sm84xYkYGHkrKe">
</script>
<script>
    var amount="{{ $post->amount }}";
    paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: amount
          },
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        toastr.success('Transaction completed by ' + details.payer.name.given_name, 'Success');
        var id='{{$post->id}}';
        var formData={date:details.create_time,
                      id:details.id,
                      status:details.status};
        console.log(formData);

        // Call your server to save the transaction
        $.ajax({
            type: 'PUT',
            url: '{{route('author.post.pay', $post->id)}}', 
            data:JSON.stringify(formData),  
            success: function() {
                toastr.success('Check your email for details', 'Success');
                setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                }, 1000);
            },
            error: function() {
                toastr.error('Data could not be saved on our server', 'Error');
            }
       });  

        //window.location.href = "{{route('admin.post.approve',$post->id)}}";
      });
    }
  }).render('#paypal-button-container');
</script>

<script>
    var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
</script>

@endpush