@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{ asset('assets/src/assets/css/light/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/assets/css/dark/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{ asset('assets/src/assets/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/editors/quill/quill.snow.css') }}">
<link href="{{ asset('assets/src/assets/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/editors/quill/quill.snow.css') }}">
<!--  END CUSTOM STYLE FILE  -->
<!--  BEGIN CUSTOM STYLE FILE  -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css') }}">
<!--  END CUSTOM STYLE FILE  -->
<link href="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/plugins/css/light/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<style>
    #ft{
        background-color: white;
        border-radius: 10px;
        box-shadow: 20px;
    }
</style>
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Contract Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Contract</li>
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
                                    <form class="section general-info"  method="post" action="{{ route('contract.store') }}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="info">
                                            <h6 class="">Contract Details</h6>
                                            <div class="row">
                                                <div class="col-12 mx-auto">
                                                    <div class="row">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-xl-5 offset-xl-1 col-sm-12 mt-3">
                                                                    <div class="form-group">
                                                                        <label for="contract_type">Contract type</label>
                                                                        <select class="form-select mb-3" name="contract_type">
                                                                            <option value="">Choose certificate type</option>
                                                                            @foreach ($contract_types as $type)
                                                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="text-danger">{{ $errors->first('contract_type') }}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-6 col-sm-12 col-6 mt-3">
                                                                    <div class="col-xl-6 col-sm-12">
                                                                        <label for="contract_type">Username<span class="text-danger">*</span></label>
                                                                        <select id="user_id" name="user_id">
                                                                            <option value="">Choose username</option>
                                                                            @foreach ($users as $user)
                                                                                <option class="user_student" value="{{ $user->id }}">{{ $user->first_name }}&nbsp;{{ $user->last_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-5 offset-xl-1 col-sm-12 mt-3">
                                                                    <div class="form-group">
                                                                        <label for="start_date">From <span class="text-danger">*</span></label>
                                                                        <input id="start_date" name="start_date" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date..">
                                                                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                                                    </div>
                                                                </div>
        
                                                                <div class="col-xl-5 col-sm-12 mt-3">
                                                                    <div class="form-group">
                                                                        <label for="end_date">To <span class="text-danger">*</span></label>
                                                                        <input id="end_date" name="end_date" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date..">
                                                                        <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-10 offset-xl-1 col-sm-12 mt-3">
                                                                    <div class="form-group">
                                                                        <label for="description">Description<span class="text-danger">*</span></label>
                                                                        <div id="editor-container">

                                                                        </div>
                                                                        <textarea name="description" id="description" class="form-control" style="display: none;"></textarea>
                                                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-11 col-md-12 mt-3">
                                                                    <div class="form-group text-end">
                                                                        <button type="submit" class="btn btn-secondary">Add Contract</button>
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
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/src/plugins/src/vanillaSelectBox/vanillaSelectBox.js') }}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/src/plugins/src/editors/quill/quill.js') }}"></script>
    <script>
        var user = new vanillaSelectBox("#user_id", {
            "maxHeight": 200,
            "search": true,
            "placeHolder": "Choose username..." 
        });

        var quill = new Quill('#editor-container', {
            modules: {
                toolbar: [
                [{ header: [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                ['image','link'],
                [{list: 'ordered'}, {list: 'bullet'}]
                ]
            },
            placeholder: 'Description of contract...',
            theme: 'snow'  // or 'bubble'
        });

        quill.on('text-change', function(delta, oldDelta, source){
            $('#description').text($(".ql-editor").html());
        });
    </script>
    <style>
        #btn-group-user_id{
            width: 500px;
            min-width: 280px;
        }
    </style>
    <script src="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.js') }}"></script>
    <script>
        var f1 = flatpickr(document.getElementById('start_date'));
        var f1 = flatpickr(document.getElementById('end_date'));
    </script>
@endsection