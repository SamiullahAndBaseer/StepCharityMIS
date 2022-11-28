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
                                        <td>{{ $item->verify_by_main_branch_director }}</td>
                                        <td>{{ $item->verify_by_main_branch_admin }}</td>
                                        <td>{{ $item->verify_by_general_office_finance }}</td>
                                        <td>{{ $item->verify_by_general_office_director }}</td>
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
    <div class="footer-wrapper mt-0">
        <div class="footer-section f-section-1">
            <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
        </div>
    </div>
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
@endsection