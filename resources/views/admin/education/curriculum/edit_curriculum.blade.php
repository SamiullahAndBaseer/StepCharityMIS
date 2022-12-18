@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/editors/quill/quill.snow.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/editors/quill/quill.snow.css') }}">
@section('title', 'Edit Curriculum')
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
                            <li class="breadcrumb-item active" aria-current="page">Edit Curriculum</li>
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
                                        <h4>Edit Curriculum</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form method="POST" action="{{ route('update.curriculum', $curriculum->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-6 col-sm-12">
                                            <label for="title">Title </label>
                                            <input type="text" value="{{ $curriculum->title }}" name="title" id="title" class="form-control">
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-6 col-sm-12">
                                            <label for="course">Courses</label>
                                            <select id="course" name="course_id" class="form-control">
                                                <option value="{{ $curriculum->course_id }}">{{ $curriculum->course->name }}</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('course_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-6 col-sm-12 mt-3">
                                            <label for="duration">Duration </label>
                                            <input type="text" value="{{ $curriculum->duration }}" name="duration" id="duration" class="form-control">
                                            @error('duration')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-6 col-sm-12 mt-3">
                                            <label for="description">Description</label>
                                            {{-- <div id="description"> --}}
                                                <textarea name="description" class="form-control">
                                                    {{ $curriculum->description }}
                                                </textarea>
                                            {{-- </div> --}}
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-3 float-end">Update Curriculum</button>
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
        <!--  END FOOTER  -->
        
    </div>
@endsection
@section('custom_js_content')
<script src="{{ asset('assets/src/plugins/src/editors/quill/quill.js') }}"></script>
<script>
    // var quill = new Quill('#description', {
    //     modules: {
    //     toolbar: [
    //         [{ header: [1, 2, false] }],
    //         ['bold', 'italic', 'underline'],
    //         ['image', 'code-block'],
    //     ]
    //     },
    //     placeholder: 'Compose an epic...',
    //     theme: 'snow'  // or 'bubble'
    // });
</script>
@endsection     