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
                        <li class="breadcrumb-item"><a href="#">Student Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Attendance setting</li>
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
                                    <form class="section general-info"  method="post" action="{{ route('update.st-course-att') }}">
                                        @csrf
                                        <div class="info">
                                            <div class="row mt-5">
                                                <div class="col-8 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-10 col-lg-10 col-md-10 mt-md-0 mt-4 offset-md-1">
                                                            @if (Session::has('status'))
                                                                <div class="alert alert-light-success alert-dismissible fade show border-0 mb-4" role="alert">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                                                    <strong>Success</strong> {{session()->get('status')}}</button>
                                                                </div>
                                                            @endif
                                                            <div class="form">
                                                                    <input type="hidden" value="{{ $setting->id }}" name="id">
                                                                    <div class="row">
                                                                        
                                                                        <div class="form-group">
                                                                            <label for="start_attendance">Start Attendance <span class="text-danger">*</span></label>
                                                                            <input type="time" class="form-control mb-3" value="{{ $setting->start_attendance }}" name="start_attendance"/>
                                                                            @error('start_attendance')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                    
                                                                        <div class="form-group">
                                                                            <label for="end_attendance">End Attendance <span class="text-danger">*</span></label>
                                                                            <input type="time" class="form-control mb-3" value="{{ $setting->end_attendance }}" name="end_attendance"/>
                                                                            @error('end_attendance')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                    
                                                                        <div class="form-group">
                                                                            <label for="course_id">Course</label>
                                                                            <select class="form-select" name="course_id">
                                                                                <option value="{{ $setting->course_id }}">{{ $setting->course->name }}</option>
                                                                                @foreach ($courses as $course)
                                                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('course_id')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-12">
                                                                            <a href="{{ route('st-attend-setting.index') }}" class="btn float-end"> <i class="flaticon-delete-1"></i> Discard</a>
                                                                            <button type="submit" class="mx-2 btn btn-primary float-end">Update</button>
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