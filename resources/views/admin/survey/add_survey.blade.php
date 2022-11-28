@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link rel="stylesheet" href="{{ asset('assets/src/plugins/src/filepond/filepond.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.css') }}">
<link href="{{ asset('assets/src/plugins/src/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/src/plugins/src/sweetalerts2/sweetalerts2.css') }}">

<link href="{{ asset('assets/src/plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/assets/css/light/components/tabs.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/light/elements/alert.css') }}">

<link href="{{ asset('assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/plugins/css/light/notification/snackbar/custom-snackbar.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/light/forms/switches.css') }}">
<link href="{{ asset('assets/src/assets/css/light/components/list-group.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/src/assets/css/light/users/account-setting.css') }}" rel="stylesheet" type="text/css" />



<link href="{{ asset('assets/src/plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/assets/css/dark/components/tabs.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/elements/alert.css') }}">

<link href="{{ asset('assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/plugins/css/dark/notification/snackbar/custom-snackbar.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/forms/switches.css') }}">
<link href="{{ asset('assets/src/assets/css/dark/components/list-group.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/src/assets/css/dark/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/plugins/css/light/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Survey Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Survey Form</li>
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
                                    <form class="section general-info"  method="post" action="{{ route('survey.store') }}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="info">
                                            <h6 class="">General Information</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                                            <div class="profile-image  mt-4 pe-md-4">

                                                                <!-- // The classic file input element we'll enhance
                                                                // to a file pond, we moved the configuration
                                                                // properties to JavaScript -->
                                            
                                                                <div class="img-uploader-content">
                                                                    <input type="file" name="profile_photo" class="filepond" accept="image/png, image/jpeg, image/gif"/>
                                                                    <span class="text-danger">{{ $errors->first('profile_photo') }}</span>
                                                                </div>
                                            
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">First Name<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="first_name" placeholder="First Name" value="{{ old('first_name') }}" name="first_name"  >
                                                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Last Name<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="last_name" placeholder="Last Name" value="{{ old('last_name') }}" name="last_name" >
                                                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Father Name<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="father_name" placeholder="Father Name" value="{{ old('father_name') }}" name="father_name" >
                                                                            <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="email">Email<span class="text-danger">*</span></label>
                                                                            <input type="email" class="form-control mb-3" id="email" value="{{ old('email') }}" placeholder="Write your email here" name="email">
                                                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                                                        </div>
                                                                    </div> 
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="primary_phone_number">Phone<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="primary_phone_number" value="{{ old('primary_phone_number') }}" placeholder="Write your phone number here" name="primary_phone_number" >
                                                                            <span class="text-danger">{{ $errors->first('primary_phone_number') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="whatsapp_number">WhatsApp<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="whatsapp_number" value="{{ old('whatsapp_number') }}" placeholder="+937xx" name="whatsapp_number" >
                                                                            <span class="text-danger">{{ $errors->first('whatsapp_number') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="id_card_number">Tazkira Number<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="id_card_number" value="{{ old('id_card_number') }}" placeholder="Write yourTazkira number here" name="id_card_number" >
                                                                            <span class="text-danger">{{ $errors->first('id_card_number') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="branch">Branch</label>
                                                                            <select class="form-select mb-3" id="branch_id" name="branch_id">
                                                                                <option value="">Choose Branch</option>
                                                                                @foreach ($branches as $branch)
                                                                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                                                @endforeach 
                                                                            </select>
                                                                            <span class="text-danger">{{ $errors->first('branch_id') }}</span>  
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="course_id">Courses</label>
                                                                            <select class="form-select mb-3" id="course_id" name="course_id">
                                                                                <option value="">Choose Course</option>
                                                                                @foreach ($courses as $course)
                                                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                                                @endforeach 
                                                                            </select>
                                                                            <span class="text-danger">{{ $errors->first('course_id') }}</span>  
                                                                        </div>
                                                                    </div>
                                                                   
                                                                   
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="date_of_birth">Date Of Birth</label>
                                                                            <input type="date" class="form-control flatpickr flatpickr-input active mb-3" id="dateOfBirth" placeholder="yyyy-mm-dd" name="date_of_birth"/>
                                                                            <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="mosque_name">Mosque name</label>
                                                                            <input type="text" class="form-control mb-3" name="mosque_name" placeholder="Mosque name" value="{{ old('mosque_name') }}" >
                                                                            @error('mosque_name')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="original_location">Original Location<span class="text-danger">*</span></label>
                                                                            <input type="original_location" class="form-control mb-3" id="original_location" name="original_location" placeholder="Original Location" >
                                                                            <span class="text-danger">{{ $errors->first('original_location') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="current_location">Current Location<span class="text-danger">*</span></label>
                                                                            <input type="current_location" class="form-control mb-3" id="current_location" name="current_location" placeholder="Current Location" >
                                                                            <span class="text-danger">{{ $errors->first('current_location') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="question_one">Question one?<span class="text-danger">*</span></label>
                                                                            <input type="question_one" class="form-control mb-3" id="question_one" name="question_one" placeholder="Question one" >
                                                                            <span class="text-danger">{{ $errors->first('question_one') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="question_two">Question Two?<span class="text-danger">*</span></label>
                                                                            <input type="question_two" class="form-control mb-3" id="question_two" name="question_two" placeholder="Question Two" >
                                                                            <span class="text-danger">{{ $errors->first('question_two') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="question_three">Question Three?<span class="text-danger">*</span></label>
                                                                            <input type="question_three" class="form-control mb-3" id="question_three" name="question_three" placeholder="Question Three" >
                                                                            <span class="text-danger">{{ $errors->first('question_three') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="question_four">Question Four?<span class="text-danger">*</span></label>
                                                                            <input type="question_four" class="form-control mb-3" id="question_four" name="question_four" placeholder="Question Four" >
                                                                            <span class="text-danger">{{ $errors->first('question_four') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="description">Description<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="description" name="description" placeholder="description here" value="{{ old('description') }}">
                                                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="form-group col-sm-6 col-xl-6 col-md-6 col-6">
                                                                                <label for="gender">Gender<span class="text-danger">*</span></label><br/>
                                                                                <div class="form-check mt-2 form-check-primary form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="gender" value="1" id="form-check-radio-primary">
                                                                                    <label class="form-check-label" for="form-check-radio-primary">
                                                                                        Male
                                                                                    </label>
                                                                                </div>
                                                                                
                                                                                <div class="form-check mt-2 form-check-info form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="gender" value="0" id="form-check-radio-info">
                                                                                    <label class="form-check-label" for="form-check-radio-info">
                                                                                        Female
                                                                                    </label>
                                                                                </div><br/>
                                                                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                                            </div>

                                                                            <div class="form-group col-sm-6 col-xl-6 col-md-6 col-6">
                                                                                <label for="marital_status">Marital Status<span class="text-danger">*</span></label><br/>
                                                                                <div class="form-check mt-2 form-check-primary form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="marital_status" value="married" id="form-check-radio-primary">
                                                                                    <label class="form-check-label" for="form-check-radio-primary">
                                                                                        Marriade
                                                                                    </label>
                                                                                </div>
                                                                                
                                                                                <div class="form-check mt-2 form-check-info form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="marital_status" value="single" id="form-check-radio-info">
                                                                                    <label class="form-check-label" for="form-check-radio-info">
                                                                                        Single
                                                                                    </label>
                                                                                </div><br/>
                                                                                <span class="text-danger">{{ $errors->first('marital_status') }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-12 mt-1">
                                                                        <div class="form-group text-end">
                                                                            <button type="submit" class="btn btn-secondary">Submit</button></button>
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
<script src="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.js') }}"></script>
<script>
    var f1 = flatpickr(document.getElementById('dateOfBirth'));
</script>
    <script src="{{ asset('assets/src/plugins/src/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageCrop.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageResize.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageTransform.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/notification/snackbar/snackbar.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
    <script>
        FilePond.registerPlugin(
            FilePondPluginFileValidateType,
            FilePondPluginImageExifOrientation,
            FilePondPluginImagePreview,
            FilePondPluginImageCrop,
            FilePondPluginImageResize,
            FilePondPluginImageTransform,
        //   FilePondPluginImageEdit
        );
        // Get a reference to the file input element
        const inputElement = document.querySelector('.filepond');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement,
            {
                imagePreviewHeight: 170,
                imageCropAspectRatio: '1:1',
                imageResizeTargetWidth: 200,
                imageResizeTargetHeight: 200,
                stylePanelLayout: 'compact circle',
                styleLoadIndicatorPosition: 'center bottom',
                styleProgressIndicatorPosition: 'right bottom',
                styleButtonRemoveItemPosition: 'left bottom',
                styleButtonProcessItemPosition: 'right bottom',
            },
        );

        FilePond.setOptions({
            server: {
                url: '{{ route('image') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
@endsection