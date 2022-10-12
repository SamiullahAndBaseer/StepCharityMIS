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
                        <li class="breadcrumb-item active" aria-current="page">Add User</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
                
            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="animated-underline-content">
                                <ul class="nav nav-tabs" id="animateLine" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="animated-underline-home-tab" data-bs-toggle="tab" href="#animated-underline-home" role="tab" aria-controls="animated-underline-home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="animated-underline-profile-tab" data-bs-toggle="tab" href="#animated-underline-profile" role="tab" aria-controls="animated-underline-profile" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg> Payment Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="animated-underline-preferences-tab" data-bs-toggle="tab" href="#animated-underline-preferences" role="tab" aria-controls="animated-underline-preferences" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Preferences</a>
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
                                    <form class="section general-info"  method="post" action="{{ route('user.store') }}"  enctype="multipart/form-data">
                                        {{ csrf_field() }}
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
                                                                    <input type="file" class="filepond" name="profile_photo_path" accept="image/png, image/jpeg, image/gif"/>
                                                                </div>
                                            
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">First Name<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="first_name" placeholder="First Name" name="first_name"  >
                                                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Last Name<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="last_name" placeholder="Last Name" name="last_name" >
                                                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Father Name<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="father_name" placeholder="Father Name" name="father_name" >
                                                                            <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="status">Status<span class="text-danger">*</span></label>
                                                                            <select class="form-select mb-3" id="status" name="status">
                                                                                <option selected>Select Status</option>
                                                                                <option value="1">Active</option>
                                                                                <option value="0">Not Active</option>
                                                                            </select>
                                                                            <span class="text-danger">{{ $errors->first('status') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="gender">Gender<span class="text-danger">*</span></label>
                                                                            <select class="form-select mb-3" id="gender" name="gender">
                                                                                <option selected>Select Gender</option>
                                                                                <option value="1">Male</option>
                                                                                <option value="0">Female</option>
                                                                            </select>
                                                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="status">Mertial Status<span class="text-danger">*</span></label>
                                                                            <select class="form-select mb-3" id="marital_status" name="marital_status">
                                                                                <option selected>Select Marital Status</option>
                                                                                <option value="1">Marriade</option>
                                                                                <option value="0">Single</option>
                                                                            </select>
                                                                            <span class="text-danger">{{ $errors->first('marital_status') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="email">Email<span class="text-danger">*</span></label>
                                                                            <input type="email" class="form-control mb-3" id="email" placeholder="Write your email here" name="email">
                                                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="role">Role</label>
                                                                            <select class="form-select mb-3" name="role_id" id="role_id" >
                                                                                @foreach ($roles as $role)
                                                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                                            </select>
                                                                           
                                                                            @endforeach  
    
                                                                        </div>
                                                                    </div> 
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="phone">Phone<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="phone" placeholder="Write your phone number here" name="phone_number" >
                                                                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="id_card_number">Tazkira Number<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="id_card_number" placeholder="Write yourTazkira number here" name="id_card_number" >
                                                                            <span class="text-danger">{{ $errors->first('id_card_number') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="salary">Salary<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="salary" name="salary" placeholder="Write your Salary number here" >
                                                                            <span class="text-danger">{{ $errors->first('salary') }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="currency">Currency</label>
                                                                            <select class="form-select mb-3" id="currency_id" name="currency_id">
                                                                                @foreach ($currencies as $currency)
                                                                                <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                                            </select>
                                                                           
                                                                        @endforeach  
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="branch">Branche</label>
                                                                            <select class="form-select mb-3" id="branch_id" name="branch_id">
                                                                                @foreach ($branches as $branch)
                                                                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                                            </select>
                                                                           
                                                                                 @endforeach  
                                                                        </div>
                                                                    </div>
                                                                   
                                                                   
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="date_of_birth">Date Of Birth</label>
                                                                            <input type="date" class="form-control mb-3" id="basicFlatpickr" placeholder="" name="date_of_birth"  >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="join_date">Join Date</label>
                                                                            <input type="date" class="form-control mb-3" id="basicFlatpickr" placeholder="" name="join_date" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="address">Address</label>
                                                                            <input type="text" class="form-control mb-3" id="address" placeholder="Address"  >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="province">Province</label>
                                                                            <select class="form-select mb-3" id="province" name="province">
                                                                                @foreach ($provinces as $province)
                                                                                <option id="{{ $province->id }}">{{ $province->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="province">District</label>
                                                                            <select class="form-select mb-3" id="district" name="district">
                                                                                <option>Kabul</option>
                                                                                <option>Mazar-e-Sharif</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="vallage">Vallage</label>
                                                                            <select class="form-select mb-3" id="vallage" name="vallage">
                                                                                <option>Kabul</option>
                                                                                <option>Mazar-e-Sharif</option>
                                                                            </select>
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
                                                                            <input type="text" class="form-control mb-3" id="bio" name="bio" placeholder="bio here">
                                                                            <span class="text-danger">{{ $errors->first('bio') }}</span>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-12 mt-1">
                                                                        <div class="form-group text-end">
                                                                            <button type="submit" class="btn btn-secondary">Save</button>
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
                        <div class="tab-pane fade" id="animated-underline-profile" role="tabpanel" aria-labelledby="animated-underline-profile-tab">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info payment-info">
                                        <div class="info">
                                            <h6 class="">Billing Address</h6>
                                            <p>Changes to your <span class="text-success">Billing</span> information will take effect starting with scheduled payment and will be refelected on your next invoice.</p>

                                            <div class="list-group mt-4">
                                                <label class="list-group-item">
                                                    <div class="d-flex w-100">
                                                        <div class="billing-radio me-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="billingAddress" id="billingAddress1" checked>
                                                            </div>
                                                        </div>
                                                        <div class="billing-content">
                                                            <div class="fw-bold">Address #1</div>
                                                            <p>2249 Caynor Circle, New Brunswick, New Jersey</p>
                                                        </div>
                                                        <div class="billing-edit align-self-center ms-auto">
                                                            <button class="btn btn-dark">Edit</button>
                                                        </div>
                                                    </div>
                                                </label>
                                               
                                                <label class="list-group-item">
                                                    <div class="d-flex w-100">
                                                        <div class="billing-radio me-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="billingAddress" id="billingAddress2">
                                                            </div>
                                                        </div>
                                                        <div class="billing-content">
                                                            <div class="fw-bold">Address #2</div>
                                                            <p>4262 Leverton Cove Road, Springfield, Massachusetts</p>
                                                        </div>
                                                        <div class="billing-edit align-self-center ms-auto">
                                                            <button class="btn btn-dark">Edit</button>
                                                        </div>
                                                    </div>
                                                </label>
                                                <label class="list-group-item">
                                                    <div class="d-flex w-100">
                                                        <div class="billing-radio me-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="billingAddress" id="billingAddress3">
                                                            </div>
                                                        </div>
                                                        <div class="billing-content">
                                                            <div class="fw-bold">Address #3</div>
                                                            <p>2692 Berkshire Circle, Knoxville, Tennessee</p>
                                                        </div>
                                                        <div class="billing-edit align-self-center ms-auto">
                                                            <button class="btn btn-dark">Edit</button>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>

                                            <button class="btn btn-secondary mt-4 add-address">Add Address</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info payment-info">
                                        <div class="info">
                                            <h6 class="">Payment Method</h6>
                                            <p>Changes to your <span class="text-success">Payment Method</span> information will take effect starting with scheduled payment and will be refelected on your next invoice.</p>

                                            <div class="list-group mt-4">
                                                
                                                <label class="list-group-item">
                                                    <div class="d-flex w-100">
                                                        <div class="billing-radio me-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod1">
                                                            </div>
                                                        </div>
                                                        <div class="payment-card">
                                                            <img src="{{ asset('assets/src/assets/img/card-mastercard.svg') }}" class="align-self-center me-3" alt="americanexpress">
                                                        </div>
                                                        <div class="billing-content">
                                                            <div class="fw-bold">Mastercard</div>
                                                            <p>XXXX XXXX XXXX 9704</p>
                                                        </div>
                                                        <div class="billing-edit align-self-center ms-auto">
                                                            <button class="btn btn-dark">Edit</button>
                                                        </div>
                                                    </div>
                                                </label>
                                                <label class="list-group-item">
                                                    <div class="d-flex w-100">
                                                        <div class="billing-radio me-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod2" checked>
                                                            </div>
                                                        </div>
                                                        <div class="payment-card">
                                                            <img src="{{ asset('assets/src/assets/img/card-americanexpress.svg') }}" class="align-self-center me-3" alt="americanexpress">
                                                        </div>
                                                        <div class="billing-content">
                                                            <div class="fw-bold">American Express</div>
                                                            <p>XXXX XXXX XXXX 310</p>
                                                        </div>
                                                        <div class="billing-edit align-self-center ms-auto">
                                                            <button class="btn btn-dark">Edit</button>
                                                        </div>
                                                    </div>
                                                </label>
                                                <label class="list-group-item">
                                                    <div class="d-flex w-100">
                                                        <div class="billing-radio me-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod3">
                                                            </div>
                                                        </div>
                                                        <div class="payment-card">
                                                            <img src="{{ asset('assets/src/assets/img/card-visa.svg') }}" class="align-self-center me-3" alt="americanexpress">
                                                        </div>
                                                        <div class="billing-content">
                                                            <div class="fw-bold">Visa</div>
                                                            <p>XXXX XXXX XXXX 5264</p>
                                                        </div>
                                                        <div class="billing-edit align-self-center ms-auto">
                                                            <button class="btn btn-dark">Edit</button>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>

                                            <button class="btn btn-secondary mt-4 add-payment">Add Payment Method</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info payment-info">
                                        <div class="info">
                                            <h6 class="">Add Billing Address</h6>
                                            <p>Changes your New <span class="text-success">Billing</span> Information.</p>

                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control add-billing-address-input">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">City</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Country</label>
                                                        <select class="form-select">
                                                            <option selected="">Choose...</option>
                                                            <option value="united-states">United States</option>
                                                            <option value="brazil">Brazil</option>
                                                            <option value="indonesia">Indonesia</option>
                                                            <option value="turkey">Turkey</option>
                                                            <option value="russia">Russia</option>
                                                            <option value="india">India</option>
                                                            <option value="germany">Germany</option>
                                                        </select>                                                            
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">ZIP</label>
                                                        <input type="tel" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary mt-4">Add</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info payment-info">
                                        <div class="info">
                                            <h6 class="">Add Payment Method</h6>
                                            <p>Changes your New <span class="text-success">Payment Method</span> Information.</p>

                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Card Brand</label>
                                                        <div class="invoice-action-currency">
                                                            <div class="dropdown selectable-dropdown cardName-select">
                                                                <a id="cardBrandDropdown" href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('assets/src/assets/img/card-mastercard.svg') }}" class="flag-width" alt="flag"> <span class="selectable-text">Mastercard</span> <span class="selectable-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></span></a>
                                                                <div class="dropdown-menu" aria-labelledby="cardBrandDropdown">
                                                                    <a class="dropdown-item" data-img-value="../src/assets/img/card-mastercard.svg') }}" data-value="GBP - British Pound" href="javascript:void(0);"><img src="{{ asset('assets/src/assets/img/card-mastercard.svg') }}" class="flag-width" alt="flag"> Mastercard</a>
                                                                    <a class="dropdown-item" data-img-value="../src/assets/img/card-americanexpress.svg') }}" data-value="IDR - Indonesian Rupiah" href="javascript:void(0);"><img src="{{ asset('assets/src/assets/img/card-americanexpress.svg') }}" class="flag-width" alt="flag"> American Express</a>
                                                                    <a class="dropdown-item" data-img-value="../src/assets/img/card-visa.svg') }}" data-value="USD - US Dollar" href="javascript:void(0);"><img src="{{ asset('assets/src/assets/img/card-visa.svg') }}" class="flag-width" alt="flag"> Visa</a>
                                                                    <a class="dropdown-item" data-img-value="../src/assets/img/card-discover.svg') }}" data-value="INR - Indian Rupee" href="javascript:void(0);"><img src="{{ asset('assets/src/assets/img/card-discover.svg') }}" class="flag-width" alt="flag"> Discover</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Card Number</label>
                                                        <input type="text" class="form-control add-payment-method-input">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Holder Name</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">CVV/CVV2</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Card Expiry</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary mt-4">Add</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="tab-pane fade" id="animated-underline-preferences" role="tabpanel" aria-labelledby="animated-underline-preferences-tab">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info">
                                        <div class="info">
                                            <h6 class="">Choose Theme</h6>
                                            <div class="d-sm-flex justify-content-around">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                      <img class="ms-3" width="100" height="68" alt="settings-dark" src="{{ asset('assets/src/assets/img/settings-light.svg') }}">
                                                    </label>
                                                </div>
                                                
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        <img class="ms-3" width="100" height="68" alt="settings-light" src="{{ asset('assets/src/assets/img/settings-dark.svg') }}">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info">
                                        <div class="info">
                                            <h6 class="">Activity data</h6>
                                            <p>Download your Summary, Task and Payment History Data</p>
                                            <div class="form-group mt-4">
                                                <button class="btn btn-primary">Download Data</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info">
                                        <div class="info">
                                            <h6 class="">Public Profile</h6>
                                            <p>Your <span class="text-success">Profile</span> will be visible to anyone on the network.</p>
                                            <div class="form-group mt-4">
                                                <div class="switch form-switch-custom switch-inline form-switch-secondary mt-1">
                                                    <input class="switch-input" type="checkbox" role="switch" id="publicProfile" checked>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info">
                                        <div class="info">
                                            <h6 class="">Show my email</h6>
                                            <p>Your <span class="text-success">Email</span> will be visible to anyone on the network.</p>
                                            <div class="form-group mt-4">
                                                <div class="switch form-switch-custom switch-inline form-switch-secondary mt-1">
                                                    <input class="switch-input" type="checkbox" role="switch" id="showMyEmail">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info">
                                        <div class="info">
                                            <h6 class="">Enable keyboard shortcuts</h6>
                                            <p>When enabled, press <code class="text-success">ctrl</code> for help</p>
                                            <div class="form-group mt-4">
                                                <div class="switch form-switch-custom switch-inline form-switch-secondary mt-1">
                                                    <input class="switch-input" type="checkbox" role="switch" id="EnableKeyboardShortcut">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info">
                                        <div class="info">
                                            <h6 class="">Hide left navigation</h6>
                                            <p>Sidebar will be <span class="text-success">hidden</span> by default</p>
                                            <div class="form-group mt-4">
                                                <div class="switch form-switch-custom switch-inline form-switch-secondary mt-1">
                                                    <input class="switch-input" type="checkbox" role="switch" id="hideLeftNavigation">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info">
                                        <div class="info">
                                            <h6 class="">Advertisements</h6>
                                            <p>Display <span class="text-success">Ads</span> on your dashboard</p>
                                            <div class="form-group mt-4">
                                                <div class="switch form-switch-custom switch-inline form-switch-secondary mt-1">
                                                    <input class="switch-input" type="checkbox" role="switch" id="advertisements">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info">
                                        <div class="info">
                                            <h6 class="">Social Profile</h6>
                                            <p>Enable your <span class="text-success">social</span> profiles on this network</p>
                                            <div class="form-group mt-4">
                                                <div class="switch form-switch-custom switch-inline form-switch-secondary mt-1">
                                                    <input class="switch-input" type="checkbox" role="switch" id="socialprofile" checked>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                        </div>
                        <div class="tab-pane fade" id="animated-underline-contact" role="tabpanel" aria-labelledby="animated-underline-contact-tab">
                            <div class="alert alert-arrow-right alert-icon-right alert-light-warning alert-dismissible fade show mb-4" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                                <strong>Warning!</strong> Please proceed with caution. For any assistance - <a href="javascript:void(0);">Contact Us</a>
                            </div>
                            
                            <div class="row">
                                <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info">
                                        <div class="info">
                                            <h6 class="">Purge Cache</h6>
                                            <p>Remove the active resource from the cache without waiting for the predetermined cache expiry time.</p>
                                            <div class="form-group mt-4">
                                                <button class="btn btn-secondary btn-clear-purge">Clear</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info">
                                        <div class="info">
                                            <h6 class="">Deactivate Account</h6>
                                            <p>You will not be able to receive messages, notifications for up to 24 hours.</p>
                                            <div class="form-group mt-4">
                                                <div class="switch form-switch-custom switch-inline form-switch-success mt-1">
                                                    <input class="switch-input" type="checkbox" role="switch" id="socialformprofile-custom-switch-success">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info">
                                        <div class="info">
                                            <h6 class="">Delete Account</h6>
                                            <p>Once you delete the account, there is no going back. Please be certain.</p>
                                            <div class="form-group mt-4">
                                                <button class="btn btn-danger btn-delete-account">Delete my account</button>
                                            </div>
                                        </div>
                                    </div>
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
@endsection