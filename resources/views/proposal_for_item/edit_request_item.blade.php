@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{ asset('assets/src/assets/css/light/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/src/plugins/src/filepond/filepond.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.css') }}">
<link href="{{ asset('assets/src/plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Finance Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Request For Item</li>
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
                                    <form class="section general-info"  method="post" action="{{ route('update.request-item') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <div class="info">
                                            <h6 class="">Request Item Information</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-10 col-lg-12 col-md-10 mt-md-0 mt-4 offset-md-1">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="title">Title<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="title" placeholder="Item title" value="{{ $item->title }}" name="title"  >
                                                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                                                           
                                                                        </div>
                                                                    </div> 

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="description">Description<span class="text-danger">*</span></label>
                                                                            <textarea name="description" rows="1" class="form-control mb-3" id="description" placeholder="description">{{ $item->description }}</textarea>
                                                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-6 col-sm-12 mt-1 mb-3">
                                                                        <label for="filepond">New Image<span class="text-danger">*</span></label>
                                                                        <div class="multiple-file-upload">
                                                                            <input type="file" 
                                                                                class="filepond file-upload-multiple"
                                                                                name="upload_file" 
                                                                                data-max-file-size="2MB"
                                                                                data-max-files="1">
                                                                        </div>
                                                                        @error('upload_file')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="col-xl-6 col-sm-12 mt-1 mb-3">
                                                                        <label for="filepond">Old Image<span class="text-danger">*</span></label>
                                                                        <div>
                                                                            <img width="300px" src="{{ asset('files/request_items') }}/{{ $item->upload_file }}" alt="{{ $item->upload_file }}">
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-12 mt-1">
                                                                        <div class="form-group text-end">
                                                                            <button type="submit" class="btn btn-secondary">Update Request Item</button>
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
<script src="{{ asset('assets/src/plugins/src/filepond/filepond.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
<script>
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginImageExifOrientation,
        FilePondPluginFileValidateSize,
        // FilePondPluginImageEdit
    );

    var multifiles = FilePond.create(
        document.querySelector('.file-upload-multiple')
    );
</script>
<script>
    FilePond.setOptions({
        server: {
            url: '{{ route('request.image') }}',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            }
        }
    });
</script>
@endsection