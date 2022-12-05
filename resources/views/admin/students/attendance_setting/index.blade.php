@extends('layouts.admin_layouts.base')
@section('custom_css_content')
@section('title', 'Attendance Setting')
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
                        <li class="breadcrumb-item"><a href="#">Students Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Attendance Settings</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->

            <div class="row layout-top-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <h4>Course Attendance</h4>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <!-- Zoom in up modal -->
                                    <button type="button" id="addCategory" class="btn btn-primary m-3 float-end" data-bs-toggle="modal" data-bs-target="#addCoureSettingModal">Add Setting</button>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="5%">
                                                <div class="form-check form-check-primary">
                                                    <input class="form-check-input" id="hover_parent_all" type="checkbox">
                                                </div>
                                            </th>
                                            <th class="ps-0" scope="col">ID</th>
                                            <th scope="col">Course</th>
                                            <th scope="col">Start Attendance</th>
                                            <th scope="col">End Attendance</th>
                                            <th class="text-center" scope="col">Created at</th>
                                            <th class="text-center" scope="col">Actions</th>
                                        </tr>
                                        <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($settings as $setting)
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-primary">
                                                    <input class="form-check-input hover_child" type="checkbox">
                                                </div>
                                            </td>
                                            <td class="ps-0">{{ $setting->id }}</td>
                                            <td>{{ $setting->course->name }}</td>
                                            <td>{{ $setting->start_attendance }}</td>
                                            <td>{{ $setting->end_attendance }}</td>
                                            <td class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                                <span class="table-inner-text">{{ $setting->created_at }}</span>
                                            </td>
                                            <td class="widget-content text-center">
                                                <a href="{{ route('st-attend-setting.edit', $setting->id) }}"><span class="badge badge-light-info">Edit</span></a>
                                                    <a class="delete_Category confirm-{{ $setting->id }}" data-id="{{ $setting->id }}"><span class="badge badge-light-danger">Delete</span></a>
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
        </div>
        @include('admin.students.attendance_setting.add_setting')
    </div>
</div>
@endsection
@section('custom_js_content')
    @include('admin.students.attendance_setting.setting_js')
    <script src="{{ asset('assets/src/plugins/src/highlight/highlight.pack.js') }}"></script>
    @if(Session::has('att_updated'))
    <script>
        Swal.fire(
            'Updated',
            '{{ Session::get('att_updated') }}',
            'success'
        );
    </script>
    @endif
@endsection