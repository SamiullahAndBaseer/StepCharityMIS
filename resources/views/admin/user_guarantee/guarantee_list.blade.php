@extends('layouts.admin_layouts.base')
@section('custom_css_content')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('assets/src/assets/css/light/apps/invoice-list.css') }}" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('assets/src/assets/css/dark/apps/invoice-list.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/light/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/elements/alert.css') }}">
    
    <script src="{{ asset('assets/src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/src/assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">User Guarantee Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Guarantees List</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            <div class="row " id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <table id="guarantee-table" class="table dt-table-hover" style="width:100%">
                            <div class="table_record">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column"> Record no. </th>
                                        <th>Fullname</th>
                                        <th>Father Name</th>
                                        <th>Gender</th>
                                        <th>Contact</th>
                                        <th>ID Card</th>
                                        <th>Guaranteed</th>
                                        <th>Relation</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_guarantees as $user_guarantee)
                                    <tr>
                                        <td class="checkbox-column"> 1 </td>
                                        <td>
                                            <a href="{{ route('single.user', $user_guarantee->id) }}" class="d-flex">
                                                <div class="usr-img-frame me-2 rounded-circle">
                                                    <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('images/user_guarantees')}}/{{ $user_guarantee->photo }}">
                                                </div>
                                                <p class="align-self-center mb-0 user-name"> {{ $user_guarantee->first_name }}&nbsp;{{ $user_guarantee->last_name }} </p>
                                            </a>
                                        </td>
                                        <td>{{ $user_guarantee->father_name }}</td>
                                        @if($user_guarantee->gender == 1)
                                            <td>Male</td>
                                        @else
                                            <td>Female</td>
                                        @endif
                                        <td>
                                            <div class="inv-amount mb-1"><img src="{{ asset('assets/custom/phone.png') }}" width="28px" height="28px" alt="">{{ $user_guarantee->phone_number }}</div>
                                            <a class="inv-amount"><img src="{{ asset('assets/custom/whatsApp.png') }}" width="25px" height="25px" alt="">{{ $user_guarantee->whatsapp }}</a>
                                        </td>
                                        <td>{{ $user_guarantee->id_card_number }}</td>
                                        <td>{{ $user_guarantee->survey->first_name }}</td>
                                        <td class="status-column">{{ $user_guarantee->relation }}</td>
                                        <td>{{ $user_guarantee->description }}</td>
                                        <td>
                                            <a class="badge badge-light-primary text-start me-2 action-edit" href="{{ route('guarantee.edit', $user_guarantee->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                            <button class="delete_guarantee badge badge-light-danger text-start confirm-{{ $user_guarantee->id }}" data-id="{{ $user_guarantee->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
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
    <script src="{{ asset('assets/custom/lessons/js/datatable.js') }}"></script>
    @include('admin.user_guarantee.guarantee_js')
    @if(Session::has('guarantee_deleted'))
    <script>
        Swal.fire(
            'Deleted!',
            "{{ Session::get('guarantee_deleted') }}",
            'success',
        );
    </script>
    @endif
    @if(Session::has('guarantee_updated'))
    <script>
        Swal.fire(
            'Updated!',
            "{{ Session::get('guarantee_updated') }}",
            'success',
        );
    </script>
    @endif
    @if(Session::has('guarantee'))
    <script>
        Swal.fire(
            'Added!',
            "{{ Session::get('guarantee') }}",
            'success',
        );
    </script>
    @endif
@endsection