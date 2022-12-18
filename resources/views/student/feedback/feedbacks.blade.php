@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{  asset('assets/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css" />
<link href="{{  asset('assets/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css" />
    @section('title', 'All Feedbacks')
@endsection

@section('content')
<div id="content" class="main-content">
    <div class="container">
        <div class="container">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Feedback Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Feedbacks</li>
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
                                    <h4>Feedbacks</h4>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <!-- Zoom in up modal -->
                                    <a href="{{ route('st_feedback.create') }}" class="btn btn-primary m-3 float-end">Add Feedback</a>
                                    
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
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th class="text-center" scope="col">Sender</th>
                                            <th class="text-center" scope="col">Feedback Type</th>
                                            <th class="text-center" scope="col">Actions</th>
                                        </tr>
                                        <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($feedbacks as $feedback)
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-primary">
                                                    <input class="form-check-input hover_child" type="checkbox">
                                                </div>
                                            </td>
                                            <td class="ps-0">{{ $feedback->id }}</td>
                                            <td>{{ $feedback->title }}</td>
                                            <td>{{ $feedback->description }}</td>
                                            <td class="text-center">
                                                <span class="table-inner-text">{{ $feedback->user->first_name }}&nbsp;{{ $feedback->user->last_name }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="table-inner-text">{{ $feedback->feedback_type->name }}</span>
                                            </td>
                                            <td class="widget-content text-center">
                                                <a href="{{ route('st_feedback.edit', $feedback->id) }}">
                                                    <span class="badge badge-light-info">Edit</span></a>
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
    </div>
</div>
@endsection
@section('custom_js_content')
    <script src="{{ asset('assets/src/plugins/src/highlight/highlight.pack.js') }}"></script>
    @if(session()->has('th_feedback'))
    <script>
        Swal.fire(
            'Done',
            '{{ Session::get('th_feedback') }}',
            'success'
        );
    </script>
    @endif
@endsection