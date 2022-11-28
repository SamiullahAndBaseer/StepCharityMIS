@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{ asset('assets/src/assets/css/light/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Remittance Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Send Remittance</li>
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
                                    <form class="section general-info"  method="post" action="{{ route('remittance.store') }}">
                                        @csrf
                                        <div class="info">
                                            <h6 class="">Remittance Information</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-10 col-lg-12 col-md-10 mt-md-0 mt-4 offset-md-1">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="remittance_number">Remittance Number<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="remittance_number" placeholder="Remittance number" value="{{ old('remittance_number') }}" name="remittance_number"  >
                                                                            <span class="text-danger">{{ $errors->first('remittance_number') }}</span>
                                                                           
                                                                        </div>
                                                                    </div> 

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="amount">Amount<span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-3" id="amount" value="{{ old('amount') }}" placeholder="amount" name="amount" >
                                                                            <span class="text-danger">{{ $errors->first('amount') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="receiver_id">Receiver</label>
                                                                            <select class="form-select mb-3" id="receiver_id" name="receiver_id">
                                                                                <option value="">Choose user</option>
                                                                                @foreach ($users as $user)
                                                                                <option value="{{ $user->id }}">{{ $user->first_name }}&nbsp;{{ $user->last_name }}</option>
                                                                                @endforeach 
                                                                            </select>
                                                                            <span class="text-danger">{{ $errors->first('receiver_id') }}</span>  
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="currency_id">Currency</label>
                                                                            <select class="form-select mb-3" id="currency_id" name="currency_id">
                                                                                <option value="">Choose currency</option>
                                                                                @foreach ($currencies as $currency)
                                                                                <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                                                @endforeach 
                                                                            </select>
                                                                            <span class="text-danger">{{ $errors->first('currency_id') }}</span>  
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-12 mt-1">
                                                                        <div class="form-group text-end">
                                                                            <button type="submit" class="btn btn-secondary">Send Remittance</button>
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