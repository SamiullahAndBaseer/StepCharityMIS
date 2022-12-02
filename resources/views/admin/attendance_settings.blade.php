@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{ asset('assets/src/assets/css/dark/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/assets/css/light/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add setting</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
                
            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">

                    <div class="tab-content" id="animateLineContent-4">
                        <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">

                                    <form class="section general-info"  method="post" action="{{ route('update.settings') }}">
                                        @csrf
                                        <div class="info">
                                            <h5 class="">Employees and Teachers Attendance</h5>
                                            <div class="row mt-5">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-10 col-lg-10 col-md-10 mt-md-0 mt-4 offset-md-1">
                                                            @if (Session::has('status'))
                                                                <div class="alert alert-light-success alert-dismissible fade show border-0 mb-4" role="alert">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                                                    <strong>Success</strong> {{session()->get('status')}}</button>
                                                                </div>
                                                            @endif
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="setting_name">Start Attendance Morning(AM) <span class="text-danger">*</span></label>
                                                                            <input type="time" class="form-control mb-3" value="{{ $setting->start_attendance_AM }}" name="start_am"/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="setting_name">Start Attendance Afternoon(PM)<span class="text-danger">*</span></label>
                                                                            <input type="time" class="form-control mb-3" value="{{ $setting->start_attendance_PM }}" name="start_pm"/>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="setting_name">End Attendance Morning(AM)<span class="text-danger">*</span></label>
                                                                            <input type="time" class="form-control mb-3" value="{{ $setting->end_attendance_AM }}" name="end_am"/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="setting_name">End Attendance Afternoon(PM)<span class="text-danger">*</span></label>
                                                                            <input type="time" class="form-control mb-3" value="{{ $setting->end_attendance_PM }}" name="end_pm"/>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12 mt-1">
                                                                        <div class="form-group text-end">
                                                                            <button type="submit" class="btn btn-secondary">Save</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
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
                    
                </div>
                
            </div>

        </div>

    </div>
    
</div>
@endsection