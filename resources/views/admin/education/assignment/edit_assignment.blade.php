@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{  asset('assets/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css" />
<link href="{{  asset('assets/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/src/plugins/src/filepond/filepond.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.css') }}">
<link href="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/plugins/css/light/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
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
                            <li class="breadcrumb-item active" aria-current="page">Assignments</li>
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->
                
                <div class="row layout-top-spacing">

                    <div id="basic" class="col-lg-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">                                
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Edit Assignment</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form method="POST" action="{{ route('update.assignment', $assign->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-6 col-sm-12 mt-3">
                                            <label for="title">Title </label>
                                            <input type="text" value="{{ $assign->title }}" name="title" id="title" class="form-control">
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-6 col-sm-12 mt-3">
                                            <label for="course">Courses</label>
                                            <select id="course" name="course" class="form-control">
                                                <option value="{{ $assign->lesson->course->id }}">{{ $assign->lesson->course->name }}</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('course')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-6 col-sm-12 mt-3">
                                            <label for="lesson">Lessons</label>
                                            <select id="lesson" name="lesson" class="form-control">
                                                <option value="{{ $assign->lesson->id }}">{{ $assign->lesson->title }}</option>
                                                @foreach ($lessons as $lesson)
                                                    <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('lesson')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-6 col-sm-12 mt-3">
                                            <div class="form-group">
                                                <label for="closing_date">Closing Date</label>
                                                <input type="date" class="form-control flatpickr flatpickr-input active mb-2" id="closing_date" placeholder="yyyy-mm-dd" value="{{ $assign->closing_date }}" name="closing_date"  >
                                                @error('closing_date') <div class="text-danger">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-12 mt-3">
                                            <label for="score">Score </label>
                                            <input type="text" value="{{ $assign->score }}" name="score" id="score" class="form-control">
                                            @error('score')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-6 col-sm-12 mt-3">
                                            <label for="description">Description </label>
                                            <input type="text" value="{{ $assign->description }}" name="description" id="description" class="form-control">
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-6 col-sm-12 mt-3">
                                            <label for="file">New File</label>
                                            <div class="multiple-file-upload">
                                                <input type="file" 
                                                    class="filepond file-upload-multiple"
                                                    name="file" 
                                                    multiple 
                                                    data-allow-reorder="true"
                                                    data-max-file-size="2MB"
                                                    data-max-files="1">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-sm-12 mt-3">
                                            @php $ext = explode('.', $assign->file);
                                                if(end($ext) == 'pdf'){
                                                    $icon = 'pdf-file.png';
                                                } elseif (end($ext) == 'xls') {
                                                    $icon = 'xls.png';
                                                } elseif (end($ext) == 'docx') {
                                                    $icon = 'docx.png';
                                                } elseif (end($ext) == 'csv') {
                                                    $icon = 'csv.png';
                                                } elseif (end($ext) == 'zip') {
                                                    $icon = 'zip.png';
                                                } elseif(end($ext) == 'jpg' || end($ext) == 'jpeg' || end($ext) == 'png') {
                                                    $icon = 'image-icon.png';
                                                } else {
                                                    $icon = 'file.png';
                                                }
                                            @endphp
                                            <label for="file">Current File</label>
                                            <div class="multiple-file-upload">
                                                <a href="{{ asset('files/assignments') }}/{{ $assign->file }}">
                                                    <img src="{{ asset('assets/custom') }}/{{ $icon }}" width="35px" height="35px" alt="{{ $assign->file }}">
                                                    {{ $assign->file }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-3 float-end">Update Assignment</button>
                                        </div>
                                    </div>
                                </form>
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
<script src="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.js') }}"></script>
    <script>
        var f1 = flatpickr(document.getElementById('closing_date'));
    </script>
    <script src="{{ asset('assets/src/plugins/src/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
    <script>
        /**
         * ====================
         * Multiple File Upload
         * ====================
        */
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
            // FilePondPluginImageEdit
        );

        FilePond.create(
            document.querySelector('.file-upload-multiple')
        );

        FilePond.setOptions({
            server: {
                url: '{{ route('save.file') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
@endsection