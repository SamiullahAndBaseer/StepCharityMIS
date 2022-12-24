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
                                    <div class="">
                                        <h4>Graduated Students</h4>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($graduated_students as $item)
                                        <tr>
                                            <td>{{ $item->user->id }}</td>
                                            <td>{{ $item->user->first_name }}&nbsp;{{ $item->user->last_name }}</td>
                                            <td>{{ $item->course->name }}</td>
                                            
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
        
    </div>
@endsection