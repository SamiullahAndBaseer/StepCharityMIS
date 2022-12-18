@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{  asset('assets/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css" />
<link href="{{  asset('assets/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css" />
    @section('title', 'Graduated Students')
@endsection
@section('content')
     <!--  BEGIN CONTENT AREA  -->
     <div id="content" class="main-content">
        <div class="container">
            <div class="container">

                <!-- BREADCRUMB -->
                <div class="page-meta">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Students Section</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Graduated Students</li>
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->
                
                <div class="row layout-top-spacing">

                    <div id="graduatedTable" class="col-lg-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                        <h4>Graduated Students</h4>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                        <!-- Zoom in up modal -->
                                        <button type="button" id="addGraduate" class="btn btn-primary m-3 float-end" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Graduate</button>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="container col-md-10 col-lg-10 col-sm-12 col-12">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Student</th>
                                            <th>Course</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($graduated_students as $item)
                                        <tr>
                                            <td>{{ $item->user->id }}</td>
                                            <td>{{ $item->user->first_name }}&nbsp;{{ $item->user->last_name }}</td>
                                            <td>{{ $item->course->name }}</td>
                                            <td>
                                                <a href="#" id="updateStudentCourse" data-s_id="{{ $item->student_id }}" data-c_id="{{ $item->course_id }}" data-id="{{ $item->id }}"
                                                    data-bs-toggle="modal" data-bs-target="#editModal">
                                                    <span class="badge badge-light-info">Edit</span></a>
                                                <a href="#" class="delete_graduated confirm-gr-{{ $item->id }}" data-id="{{ $item->id }}"><span class="badge badge-light-danger">Delete</span></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                @include('admin.students.graduated_student.add_graduated')
                @include('admin.students.graduated_student.edit_graduated')
            </div>
        </div>
        
    </div>
@endsection
@section('custom_js_content')
@include('admin.students.graduated_student.graduated_js')
@endsection