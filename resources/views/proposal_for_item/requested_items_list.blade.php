@extends('layouts.admin_layouts.base')
@section('custom_css_content')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('assets/src/assets/css/light/apps/invoice-list.css') }}" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('assets/src/assets/css/dark/apps/invoice-list.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/light/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/elements/alert.css') }}">
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('assets/src/plugins/src/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/src/plugins/src/sweetalerts2/sweetalerts2.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/editors/quill/quill.snow.css') }}">
    <link href="{{ asset('assets/src/assets/css/light/apps/mailbox.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/editors/quill/quill.snow.css') }}">
    <link href="{{ asset('assets/src/assets/css/dark/apps/mailbox.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Finance Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Requested Items List</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            <div class="row " id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <table id="survey-table" class="table dt-table-hover" style="width:100%">
                            <div class="table_record">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column"> Record no. </th>
                                        <th>Title</th>
                                        <th>Director</th>
                                        <th>Admin</th>
                                        <th>General Finance</th>
                                        <th>General Office</th>
                                        <th>Uploaded File</th>
                                        <th>Purchase</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($request_items as $item)
                                    <tr>
                                        <td class="checkbox-column"> 1 </td>
                                        <td><p class="align-self-center mb-0 user-name"> {{ $item->title }} </p></td>
                                        <td>
                                            @if($item->verify_by_main_branch_director  == 1)
                                                <div class="btn-group dropstart" role="group">
                                                    <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-info">Accept</span></span>
                                                    <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                        <span id="yes_reject-{{ $item->id }}" class="dropdown-item rejected badge badge-light-danger m-1" data-id="{{ $item->id }}" data-type="main_branch_director">Reject</span>
                                                    </div>
                                                </div>
                                            @elseif($item->verify_by_main_branch_admin  == 0)
                                                <div class="btn-group dropstart" role="group">
                                                    <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-danger">Reject</span></span>
                                                    <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                        <span id="yes_appr-{{ $item->id }}" class="dropdown-item approved badge badge-light-info m-1" data-id="{{ $item->id }}" data-type="main_branch_director">Accept</span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="btn-group dropstart" role="group">
                                                    <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-success">Pending</span></span>
                                                    <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                        <span id="yes_appr-{{ $item->id }}" class="dropdown-item approved badge badge-light-info m-1" data-id="{{ $item->id }}" data-type="main_branch_director">Accept</span><br/>
                                                        <span id="yes_reject-{{ $item->id }}" class="dropdown-item rejected badge badge-light-danger m-1" data-id="{{ $item->id }}" data-type="main_branch_director">Reject</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>

                                        <td>
                                            @if($item->verify_by_main_branch_admin  == 1)
                                                <div class="btn-group dropstart" role="group">
                                                    <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-info">Accept</span></span>
                                                    <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                        <span id="yes_reject-{{ $item->id }}" class="dropdown-item rejected badge badge-light-danger m-1" data-id="{{ $item->id }}" data-type="main_branch_admin">Reject</span>
                                                    </div>
                                                </div>
                                            @elseif($item->verify_by_main_branch_admin  == 0)
                                                <div class="btn-group dropstart" role="group">
                                                    <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-danger">Reject</span></span>
                                                    <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                        <span id="yes_appr-{{ $item->id }}" class="dropdown-item approved badge badge-light-info m-1" data-id="{{ $item->id }}" data-type="main_branch_admin">Accept</span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="btn-group dropstart" role="group">
                                                    <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-success">Pending</span></span>
                                                    <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                        <span id="yes_appr-{{ $item->id }}" class="dropdown-item approved badge badge-light-info m-1" data-id="{{ $item->id }}" data-type="main_branch_admin">Accept</span><br/>
                                                        <span id="yes_reject-{{ $item->id }}" class="dropdown-item rejected badge badge-light-danger m-1" data-id="{{ $item->id }}" data-type="main_branch_admin">Reject</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->verify_by_general_office_finance  == 1)
                                                <div class="btn-group dropstart" role="group">
                                                    <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-info">Accept</span></span>
                                                    <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                        <span id="yes_reject-{{ $item->id }}" class="dropdown-item rejected badge badge-light-danger m-1" data-id="{{ $item->id }}" data-type="general_office_finance">Reject</span>
                                                    </div>
                                                </div>
                                            @elseif($item->verify_by_main_branch_admin  == 0)
                                                <div class="btn-group dropstart" role="group">
                                                    <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-danger">Reject</span></span>
                                                    <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                        <span id="yes_appr-{{ $item->id }}" class="dropdown-item approved badge badge-light-info m-1" data-id="{{ $item->id }}" data-type="general_office_finance">Accept</span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="btn-group dropstart" role="group">
                                                    <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-success">Pending</span></span>
                                                    <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                        <span id="yes_appr-{{ $item->id }}" class="dropdown-item approved badge badge-light-info m-1" data-id="{{ $item->id }}" data-type="general_office_finance">Accept</span><br/>
                                                        <span id="yes_reject-{{ $item->id }}" class="dropdown-item rejected badge badge-light-danger m-1" data-id="{{ $item->id }}" data-type="general_office_finance">Reject</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->verify_by_general_office_director  == 1)
                                                <div class="btn-group dropstart" role="group">
                                                    <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-info">Accept</span></span>
                                                    <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                        <span id="yes_reject-{{ $item->id }}" class="dropdown-item rejected badge badge-light-danger m-1" data-id="{{ $item->id }}" data-type="general_office_director">Reject</span>
                                                    </div>
                                                </div>
                                            @elseif($item->verify_by_main_branch_admin  == 0)
                                                <div class="btn-group dropstart" role="group">
                                                    <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-danger">Reject</span></span>
                                                    <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                        <span id="yes_appr-{{ $item->id }}" class="dropdown-item approved badge badge-light-info m-1" data-id="{{ $item->id }}" data-type="general_office_director">Accept</span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="btn-group dropstart" role="group">
                                                    <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-success">Pending</span></span>
                                                    <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                        <span id="yes_appr-{{ $item->id }}" class="dropdown-item approved badge badge-light-info m-1" data-id="{{ $item->id }}" data-type="general_office_director">Accept</span><br/>
                                                        <span id="yes_reject-{{ $item->id }}" class="dropdown-item rejected badge badge-light-danger m-1" data-id="{{ $item->id }}" data-type="general_office_director">Reject</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ asset('files/request_items') }}/{{ $item->upload_file }}" class="text-info">
                                                <img src="{{ asset('files/request_items') }}/{{ $item->upload_file }}" width="35px" height="35px" alt="{{ $item->upload_file }}">
                                            </a>
                                        </td>
                                        <td>{{ $item->user->first_name }}&nbsp;{{ $item->user->last_name }}</td>
                                        <td>
                                            <a class="badge badge-light-primary text-start me-2 action-edit" href="{{ route('request-item.edit', $item->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                            <button class="delete badge badge-light-danger text-start confirm-{{ $item->id }}" data-id="{{ $item->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </div>
                            
                        </table>
                    </div>
                    
                </div>
            </div>

        </div>
        
    </div>

    <!--  BEGIN FOOTER  -->
    @include('layouts.admin_layouts.footer')
    <!--  END FOOTER  -->
</div>
@endsection
@section('custom_js_content')
    <script src="{{ asset('assets/src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/src/assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    @include('proposal_for_item.request_item_js')
    @if(Session::has('request_item'))
    <script>
        Swal.fire(
            'Success',
            "{{ Session::get('request_item') }}",
            'success',
        );
    </script>
    @endif

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            // For approved
            $(document).on('click', '.approved', function(e){
                e.preventDefault();
                var proposal_item_id = $(this).data('id');
                var status_type = $(this).data('type');
    
                $.ajax({
                    url: "{{ route('item.status') }}",
                    method: 'post',
                    data: {id: proposal_item_id, status_type: status_type, status: 1},
                    success: function(res){
                        if(res.status == 'success'){
                           document.location.reload();
                        }
                    }
                });
            });
            // for reject
            $(document).on('click', '.rejected' , function(e){
                var proposal_item_id = $(this).data('id');
                var status_type = $(this).data('type');
    
                $.ajax({
                    url: "{{ route('item.status') }}",
                    method: 'post',
                    data: {id: proposal_item_id, status_type: status_type, status: 0},
                    success: function(res){
                        if(res.status == 'success'){
                           document.location.reload();
                        }
                    }
                });
            });
        });
    </script>
@endsection