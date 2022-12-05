@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{  asset('assets/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css" />
<link href="{{  asset('assets/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css" />
    @section('title', 'Your Courses')
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
                            <li class="breadcrumb-item"><a href="#">Eduction Section</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Teacher with Courses</li>
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->
                
                <div class="row layout-top-spacing">
                    <div id="th-co" class="col-lg-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">                                
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>You teach these courses</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="container col-10">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Teacher</th>
                                            <th>Course</th>
                                            <th>Attedance</th>
                                            <th>Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teacher_courses as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->user->first_name }}&nbsp;{{ $item->user->last_name }}</td>
                                            <td>{{ $item->course->name }}</td>
                                            <td>
                                                <a href="{{ route('class.edit', $item->course->id) }}" class="badge badge-light-success">Start Attendance</a>
                                            </td>
                                            <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
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
@section('custom_js_content')
    @if(Session::has('saved'))
    <script>
        Swal.fire(
            'Successfully',
            '{{ Session::get('saved') }}',
            'success'
        )
    </script>
    @endif
@endsection