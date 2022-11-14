@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{  asset('assets/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css" />
<link href="{{  asset('assets/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="container">
        <div class="container">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Leave Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Teachers Leaves</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->

            <div class="row layout-top-spacing">
                <div id="cancel-row" class="col-lg-12 col-12 layout-spacing">

                    @if(session()->has('message'))
                    <div class="alert alert-light-success alert-dismissible fade show border-0 mb-4" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                        <strong>Success</strong> {{session()->get('message')}}</button>
                    </div>
                    @endif

                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                                    <h4>Teachers want leave.</h4>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                                    <input type="text" id="search" onkeyup="searchFunction()" class="form-control mt-3" placeholder="Search...">
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="5%">
                                            </th>
                                            <th class="ps-0" scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th class="text-center" scope="col">From</th>
                                            <th class="text-center" scope="col">To</th>
                                            <th scope="col">Reason</th>
                                            <th scope="col">Leave Type</th>
                                            <th scope="col">Status</th>
                                            <th class="text-center" scope="col">Actions</th>
                                        </tr>
                                        <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($leaves as $leave)
                                            @if($leave->user->role->name === 'Teacher')
                                            <tr>
                                                <td>
                                                </td>
                                                <td class="ps-0">{{ $leave->id }}</td>
                                                <td>
                                                    <a href="{{ route('single.user', $leave->user->id) }}" class="d-flex">
                                                        <div class="usr-img-frame me-2 rounded-circle">
                                                            <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('images')}}/{{ $leave->user->profile_photo_path }}">
                                                        </div>
                                                        <p class="align-self-center mb-0 user-name"> {{ $leave->user->first_name }}&nbsp;{{ $leave->user->last_name }} </p>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                                    <span class="table-inner-text">{{ $leave->start_date }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                                    <span class="table-inner-text">{{ $leave->end_date }}</span>
                                                </td>
                                                <td>{{ $leave->leave_reason }}</td>
                                                <td>{{ $leave->leaveType->name }}</td>
                                                <td>
                                                    @if($leave->status == 'approved')
                                                        <div class="btn-group dropstart" role="group">
                                                            <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-info">Approved</span></span>
                                                            <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                                <span id="yes_reject-{{ $leave->id }}" class="dropdown-item rejected badge badge-light-danger m-1" data-id="{{ $leave->id }}">Rejected</span>
                                                            </div>
                                                        </div>
                                                    @elseif($leave->status == 'rejected')
                                                        <div class="btn-group dropstart" role="group">
                                                            <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-danger">Rejected</span></span>
                                                            <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                                <span id="yes_appr-{{ $leave->id }}" class="dropdown-item approved badge badge-light-info m-1" data-id="{{ $leave->id }}">Approved</span>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="btn-group dropstart" role="group">
                                                            <span id="btnDropLeft" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-light-success">Pending</span></span>
                                                            <div class="dropdown-menu" aria-labelledby="btnDropLeft">
                                                                <span id="yes_appr-{{ $leave->id }}" class="dropdown-item approved badge badge-light-info m-1" data-id="{{ $leave->id }}">Approved</span><br/>
                                                                <span id="yes_reject-{{ $leave->id }}" class="dropdown-item rejected badge badge-light-danger m-1" data-id="{{ $leave->id }}">Rejected</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#" class="delete_leave confirm-leave{{ $leave->id }}"  data-id="{{ $leave->id }}"><span class="badge badge-danger m-1">Delete</span></a>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom_js_content')
    <script src="{{ asset('assets/src/plugins/src/highlight/highlight.pack.js') }}"></script>
    @include('admin.leaves.leave_js')
@endsection