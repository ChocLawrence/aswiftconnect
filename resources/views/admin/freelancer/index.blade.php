@extends('layouts.backend.app')

@section('title','Freelancers')

@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
    rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ALL FREELANCERS
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
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Meeting</th>
                                    <th>Joined</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Meeting</th>
                                    <th>Joined</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($freelancers as $key=>$freelancer)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $freelancer->name }}</td>
                                    <td>{{ $freelancer->email }}</td>
                                    <td>
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
                                    </td>
                                    <td>
                                        @if($freelancer->vet_date!=null && $freelancer->vet_time!=null )
                                            <span class="badge bg-blue">{{$freelancer->vet_date}}</span>
                                            <span class="badge bg-green">GMT {{$freelancer->vet_time}}</span>
                                            @if($freelancer->status == true)
                                                <span class="badge bg-amber">Held</span>
                                            @elseif($freelancer->status == false)
                                                <span class="badge bg-amber">Not held yet</span>
                                            @endif
                                        @else
                                            <span class="badge bg-red">Meeting not set</span>
                                        @endif
                                    </td>
                                    <td>{{  str_limit($freelancer->created_at ,'10') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.freelancer.show',$freelancer->id) }}"
                                            class="btn btn-info waves-effect">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        @if($freelancer->vet_date!=null && $freelancer->vet_time!=null )
                                        <button class="btn btn-primary waves-effect" type="button"
                                            onclick="acceptFreelancer({{ $freelancer->id }})">
                                            <i class="material-icons">done_all</i>
                                        </button>
                                        <form id="accept-form-{{ $freelancer->id }}"
                                            action="{{ route('admin.freelancer.accept',$freelancer->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                        <button class="btn btn-warning waves-effect" type="button"
                                            onclick="rejectFreelancer({{ $freelancer->id }})">
                                            <i class="material-icons">cancel</i>
                                        </button>
                                        <form id="reject-form-{{ $freelancer->id }}"
                                            action="{{ route('admin.freelancer.reject',$freelancer->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                        @endif
                                        <button class="btn btn-danger waves-effect" type="button"
                                            onclick="deleteFreelancer({{ $freelancer->id }})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form id="delete-form-{{ $freelancer->id }}"
                                            action="{{ route('admin.freelancer.destroy',$freelancer->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
</div>
@endsection

@push('js')
<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}">
</script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

<script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
    function deleteFreelancer(id) {
            swal({
                title: 'Are you sure you want to delete Freelancer?',
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

        function acceptFreelancer(id) {
            swal({
                title: 'Are you sure you want to accept Freelancer?',
                text: "They will now be able to be assigned projects",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, accept',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('accept-form-'+id).submit();
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
        
        
        function rejectFreelancer(id) {
            swal({
                title: 'Are you sure you want to reject Freelancer?',
                text: "They will now be out of the platform",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reject',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('reject-form-'+id).submit();
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
</script>
@endpush