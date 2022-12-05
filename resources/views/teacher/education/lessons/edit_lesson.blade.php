@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{  asset('assets/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css" />
<link href="{{  asset('assets/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/src/plugins/src/filepond/filepond.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.css') }}">
    @section('title', 'Edit Lesson')
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
                            <li class="breadcrumb-item active" aria-current="page">Edit Lesson</li>
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
                                        <h4>Edit Lesson</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form method="POST" action="{{ route('th_lesson.update', $lesson->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="title">Title </label>
                                            <input type="text" name="title" value="{{ $lesson->title }}" id="title" class="form-control">
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="course">Courses</label>
                                            <select id="course" name="course" class="form-control">
                                                <option value="{{ $lesson->course->id }}">{{ $lesson->course->name }}</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('course')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6 mt-3">
                                            <label for="material">New Material</label>
                                            <div class="multiple-file-upload">
                                                <input type="file" 
                                                    class="filepond file-upload-multiple"
                                                    name="material" 
                                                    multiple 
                                                    data-allow-reorder="true"
                                                    data-max-file-size="2MB"
                                                    data-max-files="1">
                                            </div>
                                        </div>
                                        <div class="col-6 mt-3">
                                            @php $ext = explode('.', $lesson->material);
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
                                            <label for="material">Current Material</label>
                                            <div class="multiple-file-upload">
                                                <a href="{{ asset('files/lessons') }}/{{ $lesson->material }}">
                                                    <img src="{{ asset('assets/custom') }}/{{ $icon }}" width="35px" height="35px" alt="{{ $lesson->material }}">
                                                    {{ $lesson->material }}
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-3 float-end">Update Lesson</button>
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
        @include('layouts.admin_layouts.footer')
        <!--  END FOOTER  -->
        
    </div>
@endsection
@section('custom_js_content')
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

        const inputElement = document.querySelector('.file-upload-multiple');

        FilePond.create(inputElement);

        FilePond.setOptions({
            server: {
                url: '{{ route('store.file') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
@endsection