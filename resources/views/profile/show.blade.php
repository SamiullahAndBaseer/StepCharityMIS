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
    @section('title', 'Profile')
    <link href="{{ asset('assets/src/plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/src/assets/css/dark/components/tabs.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/elements/alert.css') }}">
    
    <link href="{{ asset('assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/src/plugins/css/dark/notification/snackbar/custom-snackbar.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/forms/switches.css') }}">
    <link href="{{ asset('assets/src/assets/css/dark/components/list-group.css') }}" rel="stylesheet" type="text/css">
    <link href="{{  asset('assets/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{  asset('assets/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/src/assets/css/dark/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Account Settings</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
                
            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h2>Profile Settings</h2>

                            <div class="animated-underline-content">
                                <ul class="nav nav-tabs" id="animateLine" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="animated-underline-home-tab" data-bs-toggle="tab" href="#animated-underline-home" role="tab" aria-controls="animated-underline-home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="animated-underline-preferences-tab" data-bs-toggle="tab" href="#animated-underline-preferences" role="tab" aria-controls="animated-underline-preferences" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Update Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="animated-underline-contact-tab" data-bs-toggle="tab" href="#animated-underline-contact" role="tab" aria-controls="animated-underline-contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> Danger Zone</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="animateLineContent-4">
                        <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    @include('profile.update-profile-information-form')
                                </div>
                            </div>
                            <div class="row education_section">
                                <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info payment-info">
                                        <div class="info">
                                            <h6 class="">Education Information</h6>
                                            <div class="list-group mt-4">
                                                @foreach (Auth::user()->educationInfo as $edu)
                                                <div class="row">
                                                    <div class="col-md-10 col-sm-10 col-10 col-lg-10">
                                                        <label class="list-group-item">
                                                            <div class="d-flex w-100">
                                                                <div class="billing-radio me-2">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="billingAddress" id="billingAddress1" checked>
                                                                    </div>
                                                                </div>
                                                                <div class="billing-content">
                                                                    <div class="fw-bold">
                                                                        <span><span class="text-success">{{ $edu->institution }}</span>, {{ $edu->degree }}</span>
                                                                    </div>
                                                                    <p class="fw-bold mt-1" style="font-size: 100%">Subject - {{ $edu->subject }}</p>
                                                                    <p class="fw-bold" style="font-size: 90%"><span class="text-info">since: </span> {{ $edu->starting_date }}, <span class="text-info">to </span> {{ $edu->complete_date }}</p>
                                                                    <p class="fw-bold"><span class="text-primary">Additional: </span> {{ $edu->additional }} </p>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-lg-2 col-2">
                                                        {{-- <a class="badge badge-light-primary text-start m-1" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a> --}}
                                                        <a class="badge badge-light-danger text-start m-1 delete_edu confirm-{{ $edu->id }}" data-id="{{ $edu->id }}" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info payment-info">
                                        <form id="addEducationForm" method="POST" action="{{ route('add.education') }}" class="info">
                                            @csrf
                                            <h6 class="">Add more institution</h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Institution</label>
                                                        <input type="text" name="institution" class="form-control" placeholder="Oxford University">
                                                        <span class="text-danger institution_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Subject</label>
                                                        <input type="text" name="subject" class="form-control" placeholder="Computer">
                                                        <span class="text-danger subject_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Starting Date</label>
                                                        <input type="date" class="form-control" name="starting_date" placeholder="yyyy-mm-dd">
                                                        <span class="text-danger starting_date_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Complete Date</label>
                                                        <input type="date" class="form-control" name="complete_date" placeholder="for current select empty">
                                                        <span class="text-danger complete_date_error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Degree</label>
                                                        <input type="text" class="form-control" placeholder="Master" name="degree">
                                                        <span class="text-danger degree_error"></span>                                                          
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Grade</label>
                                                        <input type="text" class="form-control" placeholder="A" name="grade">
                                                        <span class="text-danger grade_error"></span>                                                         
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-2">
                                                        <label class="form-label">Additional</label>
                                                        <textarea name="additional" id="additional" class="form-control" placeholder="additional information"></textarea>
                                                        <span class="text-danger additional_error"></span>                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary mt-4">Add</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="animated-underline-preferences" role="tabpanel" aria-labelledby="animated-underline-profile-tab">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                    @include('profile.update-password-form')
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="animated-underline-contact" role="tabpanel" aria-labelledby="animated-underline-contact-tab">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                    @livewire('profile.logout-other-browser-sessions-form')
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>

        </div>

        <div id="logoutOtherModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Log Out Other Browser Sessions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <form class="mt-0" method="post" action="{{ route('logout.other') }}" id="logoutOtherBrowserForm">
                        @csrf
                    <div class="modal-body">
                        <p>Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.</p>
                        
                        <div class="mt-4">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                            <span class="text-danger password_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer md-button">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-outline-dark">
                            <i class="flaticon-cancel-12"></i>Cancel
                        </button>
                                
                        <button type="submit" class="btn btn-dark">
                            Log Out Other Browser Sessions
                        </button>
                    </div>
                    </form>
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
    @include('profile.profile_js')
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
    <script src="{{ asset('assets/src/assets/js/users/account-settings.js') }}"></script>
    <script>
        FilePond.create(
            document.querySelector('.filepond'),
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
            files: [
                {
                        // the server file reference
                        source: '{{ asset('images') }}/{{ Auth::user()->profile_photo_path }}',

                        // set type to limbo to tell FilePond this is a temp file
                        options: {
                            type: 'image/png/jpg/jpeg',
                        },
                    },
                ],
            }
        );

        FilePond.setOptions({
            server: {
                url: '{{ route('update.image', Auth::user()->id) }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                method: 'post',
            }
        });
    </script> 
@endsection
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout> --}}
