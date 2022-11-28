@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{ asset('assets/src/assets/css/light/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
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
                        <li class="breadcrumb-item"><a href="#">Salary Payment Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Salary Payment</li>
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
                                    <div class="section general-info">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <img class="ms-5 mt-5 mx-5" src="{{ asset('assets/src/assets/img/logo.png') }}" width="80px" alt="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                                                <div class="row">
                                                    <h6><span class="float-end mx-5 text-light-dark">Salary Payment Details</span></h6>
                                                </div>
                                                <div class="row">
                                                    <h6><span class="float-end mx-5 text-light-dark"><b>Date:</b> {{ Carbon\Carbon::parse(Carbon\Carbon::now())->format('Y-M-d h:i A') }}</span></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing mx-auto">
                                                <div class="invoice-00001 ms-5 mt-3 mx-5">
                                                    <div id="details-user" class="content-section">

                                                        <div class="inv--detail-section inv--customer-detail-section">
                                                            <form class="form" method="post" action="{{ route('salary-report.store') }}">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 align-self-center">
                                                                        <label for="user_id">Username<span class="text-danger">*</span></label>
                                                                        <div class="form-group">
                                                                            <select name="user_id" class="form-select" id="user_id">
                                                                                <option value="">Choose user</option>
                                                                                @foreach ($users as $user)
                                                                                    <option value="{{ $user->id }}">{{ $user->first_name }}&nbsp;{{ $user->last_name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="text-danger">{{ $errors->first('user_id') }}</div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 align-self-center">
                                                                        <div class="form-group">
                                                                            <label for="tip" class="form-label">Tip</label>
                                                                            <input type="text" class="form-control" name="tip" value="0" placeholder="Write tip here">
                                                                            @error('tip')<span class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 align-self-center">
                                                                        <div class="form-group mt-3">
                                                                            <label for="Description" class="form-label">Description</label>
                                                                            <textarea name="description" id="description" class="form-control"></textarea>
                                                                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3">
                                                                    <div class="col-12 col-xl-12 col-lg-12 col-sm-12">
                                                                        <div class="float-end form-group">
                                                                            <a href="{{ route('salary-report.index') }}" class="btn btn-outline-info">Cancel</a>
                                                                            <button type="submit" class="btn btn-success">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            
                                                        </div>

                                                        <div class="inv--note">

                                                            <div class="row mt-4">
                                                                <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                                    <p>Note: Thank you.</p>
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