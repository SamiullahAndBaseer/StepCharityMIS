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
                        <li class="breadcrumb-item"><a href="#">User Guarantee Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Guarantee Form</li>
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
                                    <form class="section general-info"  method="POST" action="{{ route('guarantee.store') }}"  enctype="multipart/form-data">
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
                                                                        <input type="hidden" name="survey_id" value="{{ $survey->id }}">
                                                                        <div class="form-group">
                                                                            <label for="first_name">First Name<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="first_name" placeholder="First Name" value="{{ old('first_name') }}" name="first_name"  >
                                                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="last_name">Last Name<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="last_name" placeholder="Last Name" value="{{ old('last_name') }}" name="last_name" >
                                                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="father_name">Father Name<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="father_name" placeholder="Father Name" value="{{ old('father_name') }}" name="father_name" >
                                                                            <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="email">Email<span class="text-danger">*</span></label>
                                                                            <input type="email" class="form-control mb-3" id="email" value="{{ old('email') }}" placeholder="name@example.com" name="email">
                                                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                                                        </div>
                                                                    </div> 
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="phone_number">Phone<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="phone_number" value="{{ old('phone_number') }}" placeholder="+937xxxxxxxx" name="phone_number" >
                                                                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="whatsapp">WhatsApp<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="whatsapp" value="{{ old('whatsapp') }}" placeholder="+937xxxxxxxx" name="whatsapp" >
                                                                            <span class="text-danger">{{ $errors->first('whatsapp') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="id_card_number">Tazkira Number<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="id_card_number" value="{{ old('id_card_number') }}" placeholder="1401-xxxx-xxxx" name="id_card_number" >
                                                                            <span class="text-danger">{{ $errors->first('id_card_number') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="relaton">Relation<span class="text-danger">*</span></label>
                                                                            <select class="form-control" name="relation">
                                                                                <option value="">Choose relation</option>
                                                                                <option value="Brother">Brother</option>
                                                                                <option value="Uncle">Uncle</option>
                                                                                <option value="Imam">Imam</option>
                                                                                <option value="Neighbor">Neighbor</option>
                                                                                <option value="Other">Other</option>
                                                                            </select>
                                                                            <span class="text-danger">{{ $errors->first('relation') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="date_of_birth">Date Of Birth</label>
                                                                            <input type="text" class="form-control flatpickr flatpickr-input active mb-3" id="dateOfBirth" placeholder="yyyy-mm-dd" name="date_of_birth"/>
                                                                            <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="original_address">Original Address<span class="text-danger">*</span></label>
                                                                            <input type="original_address" class="form-control mb-3" id="original_address" name="original_address" placeholder="Original Address" >
                                                                            <span class="text-danger">{{ $errors->first('original_address') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="current_address">Current Address<span class="text-danger">*</span></label>
                                                                            <input type="current_address" class="form-control mb-3" id="current_address" name="current_address" placeholder="Current Address" >
                                                                            <span class="text-danger">{{ $errors->first('current_address') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="description">Why this person is deserved?<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="description" name="description" placeholder="answer here" value="{{ old('description') }}">
                                                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
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