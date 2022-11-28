@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{ asset('assets/src/assets/css/light/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/assets/css/dark/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
<!--  BEGIN CUSTOM STYLE FILE  -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/editors/quill/quill.snow.css') }}">

<link href="{{ asset('assets/src/assets/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/editors/quill/quill.snow.css') }}">
<!--  END CUSTOM STYLE FILE  -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css') }}">
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Report Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Report</li>
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
                                    <form class="section general-info"  method="post" action="{{ route('update.report', $report->id) }}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="info">
                                            <h6 class="">Report Details</h6>
                                            <div class="row">
                                                <div class="col-12 mx-auto">
                                                    <div class="row">
                                                        <div class="form">
                                                            <div class="row m-5">
                                                                <div class="col-xl-4 col-sm-12 mt-3">
                                                                    <div class="form-group">
                                                                        <label for="title">Title<span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control mb-3" placeholder="Report title" value="{{ $report->title }}" name="title">
                                                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-4 col-sm-12 mt-3">
                                                                    <div class="form-group">
                                                                        <label for="report_type_id">Report Type<span class="text-danger">*</span></label>
                                                                        <select class="form-select mb-3" id="report_type_id" name="report_type_id">
                                                                            <option value="{{ $report->report_type_id }}">{{ $report->reportType->name }}</option>
                                                                            @foreach ($report_types as $type)
                                                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('report_type_id')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-4 col-sm-12 mt-3">
                                                                    <label for="receiver">Receiver<span class="text-danger">*</span></label>
                                                                    <div class="form-group">
                                                                        <select name="receiver" id="receiver">
                                                                            <option value="{{ $report->receiver }}" selected>{{ $report->receiver }}</option>
                                                                            @foreach ($users as $user)
                                                                                <option value="{{ $user->first_name }}&nbsp;{{ $user->last_name }}">{{ $user->first_name }}&nbsp;{{ $user->last_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <div class="text-danger">{{ $errors->first('receiver') }}</div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-12 col-sm-12 mt-3">
                                                                    <div class="form-group">
                                                                        <label for="description">Description<span class="text-danger">*</span></label>
                                                                        <div id="editor-container">
                                                                            {!! $report->description !!}
                                                                        </div>
                                                                        <textarea name="description" id="description" class="form-control" style="display: none;">{{ $report->description }}</textarea>
                                                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 mt-3">
                                                                    <div class="form-group text-end">
                                                                        <button type="submit" class="btn btn-secondary">Update Report</button>
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

    <!--  BEGIN FOOTER  -->
    <div class="footer-wrapper">
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
    <script src="{{ asset('assets/src/plugins/src/editors/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js') }}"></script>
    <script>
        var quill = new Quill('#editor-container', {
            modules: {
                toolbar: [
                [{ header: [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                ['image','link'],
                [{list: 'ordered'}, {list: 'bullet'}]
                ]
            },
            placeholder: 'Description of report ...',
            theme: 'snow'  // or 'bubble'
        });

        quill.on('text-change', function(delta, oldDelta, source){
            $('#description').text($(".ql-editor").html());
        });

        var user = new vanillaSelectBox("#receiver", {
            "maxHeight": 200,
            "minWidth": 350,
            "search": true,
            "placeHolder": "Choose receiver..." 
        });
    </script>
@endsection