@extends('layouts.admin_layouts.base')
@section('custom_css_content')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{  asset('assets/src/assets/css/light/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{  asset('assets/src/assets/css/dark/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <style>
        .card{
            height: 3.575in;
            width: 2.475in;
            padding: 1.3rem 0 1 1.3rem 0;
            box-shadow: 0 0 5px #b4b4b4b4;
            background-image: url('{{ asset("assets/custom/ID-card.jpeg") }}');
            background-repeat: no-repeat;
            background-size: 238.4px 344px;
            border-radius: 10px;
        }
        .companyname{
            position: absolute;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 1.09rem;
            margin-top: .7rem;
            top: 4.3%;
            left: 3%;
            color: oldlace;
        }
        .company-img{
            position: absolute;
            top: 15%;
            left: 33%;
            max-width: 76px;
        }
        .profile-img{
            position: absolute;
            top: 37%;
            left: 26%;
            width: 116px;
            height: 116px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, .2)
        }
        .profile-name{
            position: absolute;
            top: 70%;
            font-weight: 400;
            text-transform: uppercase;
            font-size: 1.2rem;
            margin-top: .5rem;
            color: darkblue;
        }
        .profile-username{
            position: absolute;
            top: 78%;
            font-weight: 300;
            font-size: 1rem;
            margin-top: .6rem;
            text-align: center;
            color: navy;
        }
        .names{
            margin-left: 6%;
        }

        .squre-qr{
            position: absolute;
            align-items: center;
            top: 15%;
            left: 15%;
            box-shadow: 0 0 100px #76aabfb4;
        }

        .dt{
            top: 62%;
            position: absolute;
            font-weight: 400;
            font-size: 1.0rem;
            margin-top: .5rem;
            color: darkblue;
            left: 4%;
        }
        .dt1{
            top: 69%;
            position: absolute;
            font-weight: 400;
            font-size: 1.0rem;
            margin-top: .5rem;
            color: darkblue;
            left: 4%;
        }
        .dt2{
            top: 76%;
            position: absolute;
            font-weight: 400;
            font-size: 1.0rem;
            margin-top: .5rem;
            color: darkblue;
            left: 4%;
        }
    </style>
@endsection
@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">
                
                <div class="row invoice layout-top-spacing layout-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        
                        <div class="doc-container">

                            <div class="row">

                                <div class="col-xl-9">

                                    <div class="invoice-container">
                                        <div class="invoice-inbox">
                                            
                                            <div id="ct" class="">
                                                
                                                <div class="invoice-00001">
                                                    <div class="content-section">
    
                                                        <div class="inv--head-section inv--detail-section">
                                                        
                                                            <div class="row" style="margin-bottom: 5%;">
                                                                <div class="col-sm-4 text-sm-end">
                                                                    
                                                                    <div class="d-flex">
                                                                        <h3 class="in-heading align-self-center">{{ $user->first_name }}&nbsp;{{ $user->last_name }}</h3>
                                                                    </div>
                                                                    <div class="text-start m-3 mt-5">
                                                                        <p class="inv-email-address m-2"><em>Email: </em>{{ $user->email }}</p>
                                                                        <p class="inv-email-address m-2"><em>Phone: </em>{{ $user->phone_number }}</p>
                                                                        <p class="inv-email-address m-2"><em>Tazkira: </em>{{ $user->id_card_number }}</p>
                                                                        <p class="inv-created-date m-2 mt-sm-5 mt-3"><span class="inv-title">DoB : </span> <span class="inv-date">{{ $user->date_of_birth }}</span></p>
                                                                        <p class="inv-due-date"><span class="inv-title">Date of Join : </span> <span class="inv-date">{{ $user->created_at }}</span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 col-12 mr-auto">
                                                                    <div class="card">
                                                                        <div class="text-xenter">
                                                                            <div class="pp">
                                                                                <h4 class="companyname">Step Organiztion</h4>
                                                                                <img class="company-img" src="{{ asset('assets/src/assets/img/logo.png') }}" alt="">
                                                                                <img class="profile-img" src="{{ asset('images')}}/{{ $user->profile_photo_path }}" alt="">
                                                                            </div>
                                                                            <div class="names">
                                                                                <h2 class="profile-name">{{ $user->first_name }}</h2>
                                                                                <h4 class="profile-username">{{ $user->role->name }}</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 col-12 mr-auto">
                                                                    <div class="card">
                                                                        <div class="pp">
                                                                            <h4 class="companyname">Step Organiztion</h4>
                                                                            <div class="squre-qr">
                                                                                {!! QrCode::size(160)->generate('1, samigulzar178@gmail.com') !!}
                                                                            </div>
                                                                            <div class="details">
                                                                                <h4 class="dt"><b>DoB: </b>{{ $user->date_of_birth }}</h4>
                                                                                <h4 class="dt1"><b>Moblie: </b>{{ $user->phone_number }}</h4>
                                                                                <h4 class="dt2"><b>Address: </b>Kabul, Kotali khair khana</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>                                            
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="inv--product-table-section">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td scope="col"><b>{{ $user->role->name }} ID</b></td>
                                                                            <td>{{ $user->id }}</td>
                                                                            <td><b>#Tazkira</b></td>
                                                                            <td>{{ $user->id_card_number }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Full Name</b></td>
                                                                            <td>{{ $user->first_name }}&nbsp;{{ $user->last_name }}</td>
                                                                            <td><b>Email</b></td>
                                                                            <td>{{ $user->email }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Father Name</b></td>
                                                                            <td>{{ $user->father_name }}</td>
                                                                            <td><b>Salary</b></td>
                                                                            <td>{{ $user->salary }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Phone</b></td>
                                                                            <td>{{ $user->phone_number }}</td>
                                                                            <td><b>Gender</b></td>
                                                                            @if($user->gender == 1)
                                                                                <td>Male</td>
                                                                            @else
                                                                                <td>Female</td>
                                                                            @endif
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Bio</b></td>
                                                                            <td>{{ $user->bio }}</td>
                                                                            <td><b>Marital Status</b></td>
                                                                            @if($user->marital_status == 1)
                                                                                <td>Married</td>
                                                                            @else
                                                                                <td>Single</td>
                                                                            @endif
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Phone</b></td>
                                                                            <td>{{ $user->phone_number }}</td>
                                                                            <td><b>Address</b></td>
                                                                            <td>Khair khana, Kabul, Afghanistan</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="inv--detail-section inv--customer-detail-section">

                                                            <div class="row">
    
                                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                                    <p class="inv-to">Monthly Report </p>
                                                                </div>

                                                                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-end mt-sm-0 mt-5">
                                                                    <h6 class=" inv-title"></h6>
                                                                </div>
                                                                
                                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                                    <p class="inv-customer-name">Present</p>
                                                                    <p class="inv-street-addr">Leave</p>
                                                                    <p class="inv-email-address text-danger">Absent</p>
                                                                </div>
                                                                
                                                                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1 text-sm-end">
                                                                    <p class="inv-customer-name">23 Days</p>
                                                                    <p class="inv-street-addr">3 Days</p>
                                                                    <p class="inv-email-address text-danger">0 Days</p>
                                                                </div>

                                                            </div>
                                                            
                                                        </div>

                                                        <div class="inv--note">

                                                            <div class="row mt-4">
                                                                <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                                    <p>Note: Go to print page select custom type 2 for print only card.</p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <hr>
                                                        <div class="inv--head-section inv--detail-section">
                                                        
                                                            <div class="row" style="margin-bottom: 5%;">
                                                                <div class="col-sm-4 text-sm-end">
                                                                    
                                                                    <div class="d-flex">
                                                                        <h3 class="in-heading align-self-center">{{ $user->first_name }}&nbsp;{{ $user->last_name }}</h3>
                                                                    </div>
                                                                    <div class="text-start m-3 mt-5">
                                                                        <p class="inv-email-address m-2"><em>Email: </em>{{ $user->email }}</p>
                                                                        <p class="inv-email-address m-2"><em>Phone: </em>{{ $user->phone_number }}</p>
                                                                        <p class="inv-email-address m-2"><em>Tazkira: </em>{{ $user->id_card_number }}</p>
                                                                        <p class="inv-created-date m-2 mt-sm-5 mt-3"><span class="inv-title">DoB : </span> <span class="inv-date">{{ $user->date_of_birth }}</span></p>
                                                                        <p class="inv-due-date"><span class="inv-title">Date of Join : </span> <span class="inv-date">{{ $user->created_at }}</span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 col-12 mr-auto">
                                                                    <div class="card">
                                                                        <div class="text-xenter">
                                                                            <div class="pp">
                                                                                <h4 class="companyname">Step Organiztion</h4>
                                                                                <img class="company-img" src="{{ asset('assets/src/assets/img/logo.png') }}" alt="">
                                                                                <img class="profile-img" src="{{ asset('images')}}/{{ $user->profile_photo_path }}" alt="">
                                                                            </div>
                                                                            <div class="names">
                                                                                <h2 class="profile-name">{{ $user->first_name }}</h2>
                                                                                <h4 class="profile-username">{{ $user->role->name }}</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 col-12 mr-auto">
                                                                    <div class="card">
                                                                        <div class="pp">
                                                                            <h4 class="companyname">Step Organiztion</h4>
                                                                            <div class="squre-qr">
                                                                                {!! QrCode::size(160)->generate('1, samigulzar178@gmail.com') !!}
                                                                            </div>
                                                                            <div class="details">
                                                                                <h4 class="dt"><b>DoB: </b>{{ $user->date_of_birth }}</h4>
                                                                                <h4 class="dt1"><b>Moblie: </b>{{ $user->phone_number }}</h4>
                                                                                <h4 class="dt2"><b>Address: </b>Kabul, Kotali khair khana</h4>
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

                                <div class="col-xl-3">

                                    <div class="invoice-actions-btn">

                                        <div class="invoice-action-btn">

                                            <div class="row">
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="javascript:void(0);" class="btn btn-primary btn-send">Send Email</a>
                                                </div>
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="javascript:void(0);" class="btn btn-secondary btn-print  action-print">Print</a>
                                                </div>
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-dark btn-edit">Edit</a>
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
    <!--  END CONTENT AREA  -->
@endsection
@section('custom_js_content')
    <script src="{{ asset('assets/src/assets/js/apps/invoice-preview.js') }}"></script>
@endsection