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
<link href="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/plugins/css/light/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">

@section('title', 'Edit Employee')
<link href="{{ asset('assets/src/plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/assets/css/dark/components/tabs.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/elements/alert.css') }}">

<link href="{{ asset('assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/plugins/css/dark/notification/snackbar/custom-snackbar.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/forms/switches.css') }}">
<link href="{{ asset('assets/src/assets/css/dark/components/list-group.css') }}" rel="stylesheet" type="text/css">

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
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                                    <form class="section general-info"  method="post" action="{{ route('update.user', $user->id) }}"  enctype="multipart/form-data">
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
                                                                </div>
                                                                @error('profile_photo')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                            
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">First Name<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" value="{{ $user->first_name }}" id="first_name" placeholder="First name" name="first_name"  >
                                                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Last Name<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" value="{{ $user->last_name }}" id="last_name" placeholder="Last name" name="last_name" >
                                                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Father Name<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" value="{{ $user->father_name }}" id="father_name" placeholder="Father name" name="father_name" >
                                                                            <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="email">Email<span class="text-danger">*</span></label>
                                                                            <input type="email" class="form-control mb-3" value="{{ $user->email }}" id="email" placeholder="hello@example.com" name="email">
                                                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                                                        </div>
                                                                    </div> 
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="phone">Phone<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" value="{{ $user->phone_number }}" id="phone" placeholder="00937xxxxxxxxx" name="phone_number" >
                                                                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="id_card_number">Tazkira Number<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" value="{{ $user->id_card_number }}" id="id_card_number" placeholder="tazkira number here" name="id_card_number" >
                                                                            <span class="text-danger">{{ $errors->first('id_card_number') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="salary">Salary<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" value="{{ $user->salary }}" id="salary" name="salary" placeholder="salary per day" >
                                                                            <span class="text-danger">{{ $errors->first('salary') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="currency">Currency</label>
                                                                            <select class="form-select mb-3" id="currency_id" name="currency_id">
                                                                                @foreach ($currencies as $currency)
                                                                                <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                                                @endforeach 
                                                                            </select>
                                                         
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="branch">Branch</label>
                                                                            <select class="form-select mb-3" id="branch_id" name="branch_id">
                                                                                @foreach ($branches as $branch)
                                                                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                                                @endforeach 
                                                                            </select>  
                                                                        </div>
                                                                    </div>
                                                                   
                                                                   
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="date_of_birth">Date Of Birth</label>
                                                                            <input type="text" class="form-control flatpickr flatpickr-input active mb-3" id="basicFlatpickr" placeholder="yyyy-mm-dd" value="{{ $user->date_of_birth }}" name="date_of_birth"/>
                                                                            <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="join_date">Join Date</label>
                                                                            <input type="text" class="form-control flatpickr-input active mb-3" id="joinDate" placeholder="yyyy-mm-dd" value="{{ $user->join_date }}" name="join_date"/>
                                                                            <span class="text-danger">{{ $errors->first('join_date') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="address">Address</label>
                                                                            <input type="text" class="form-control mb-3" value="{{ $user->address }}" name="address" placeholder="Address"  >
                                                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="province">Province</label>
                                                                            <select class="form-select mb-3 dynamic" id="province" name="province">
                                                                                @if($user->district != null)
                                                                                    <option value="{{ $user->district->province->id }}">{{ $user->district->province->name }}</option>
                                                                                @endif
                                                                                @foreach ($provinces as $province)
                                                                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <span class="text-danger">{{ $errors->first('province') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="province">District</label>
                                                                            <select class="form-select mb-3" id="district" name="district">
                                                                                @if($user->district_id != null)
                                                                                    <option value="{{ $user->district_id }}">{{ $user->district->name }}</option>
                                                                                @endif
                                                                                @foreach ($districts as $district)
                                                                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <span class="text-danger">{{ $errors->first('district') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="password">Password<span class="text-danger">*</span></label>
                                                                            <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Password" >
                                                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="bio">Bio<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" value="{{ $user->bio }}" id="bio" name="bio" placeholder="bio here">
                                                                            <span class="text-danger">{{ $errors->first('bio') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <label for="status">Status<span class="text-danger">*</span></label><br/>
                                                                                    <div class="form-check form-check-primary form-check-inline">
                                                                                        <input class="form-check-input" type="radio" name="status" value="1" id="form-check-radio-primary" @if($user->status == 1) checked @endif>
                                                                                        <label class="form-check-label" for="form-check-radio-primary">
                                                                                            Active
                                                                                        </label>
                                                                                    </div>
                                                                                    
                                                                                    <div class="form-check form-check-info form-check-inline">
                                                                                        <input class="form-check-input" type="radio" name="status" value="0" id="form-check-radio-info" @if($user->status == 0) checked @endif>
                                                                                        <label class="form-check-label" for="form-check-radio-info">
                                                                                            Not active
                                                                                        </label>
                                                                                    </div><br/>
                                                                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <label for="gender">Gender<span class="text-danger">*</span></label><br/>
                                                                                    <div class="form-check form-check-primary form-check-inline">
                                                                                        <input class="form-check-input" type="radio" name="gender" value="1" id="form-check-radio-primary" @if($user->gender == 1) checked @endif>
                                                                                        <label class="form-check-label" for="form-check-radio-primary">
                                                                                            Male
                                                                                        </label>
                                                                                    </div>
                                                                                    
                                                                                    <div class="form-check form-check-info form-check-inline">
                                                                                        <input class="form-check-input" type="radio" name="gender" value="0" id="form-check-radio-info" @if($user->gender == 0) checked @endif>
                                                                                        <label class="form-check-label" for="form-check-radio-info">
                                                                                            Female
                                                                                        </label>
                                                                                    </div><br/>
                                                                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="marital_status">Marital Status<span class="text-danger">*</span></label><br/>
                                                                            <div class="form-check form-check-primary form-check-inline">
                                                                                <input class="form-check-input" type="radio" name="marital_status" value="1" id="form-check-radio-primary" @if($user->status == 1) checked @endif>
                                                                                <label class="form-check-label" for="form-check-radio-primary">
                                                                                    Marriade
                                                                                </label>
                                                                            </div>
                                                                            
                                                                            <div class="form-check form-check-info form-check-inline">
                                                                                <input class="form-check-input" type="radio" name="marital_status" value="0" id="form-check-radio-info" @if($user->status == 0) checked @endif>
                                                                                <label class="form-check-label" for="form-check-radio-info">
                                                                                    Single
                                                                                </label>
                                                                            </div><br/>
                                                                            <span class="text-danger">{{ $errors->first('marital_status') }}</span>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-12 mt-1">
                                                                        <div class="form-group text-end">
                                                                            <button type="submit" class="btn btn-secondary">Update User</button>
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
    @include('layouts.admin_layouts.footer')
    <!--  END FOOTER  -->
    
</div>

@endsection
@section('custom_js_content')
    <script src="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.js') }}"></script>
    <script>
        var f1 = flatpickr(document.getElementById('basicFlatpickr'));
        var f2 = flatpickr(document.getElementById('joinDate'));
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
                files: [
                    {
                        // the server file reference
                        source: '{{ asset('images') }}/{{ $user->profile_photo_path }}',

                        // set type to limbo to tell FilePond this is a temp file
                        options: {
                            type: 'image/png/jpg/jpeg',
                        },
                    },
                ],
            },
        );

        FilePond.setOptions({
            server: {
                url: '{{ route('update.image', $user->id) }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                method: 'post',
            }
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.dynamic').change(function(){
                if($(this).val() != ''){
                    var value = $(this).val();

                    // console.log(select);
                    $.ajax({
                        url:'{{ route('get.districts') }}',
                        method: "POST",
                        data: {value: value},
                        success:function(result){
                            $('#district').html(result);
                        }
                    });
                }
            });
        });
    </script>
@endsection