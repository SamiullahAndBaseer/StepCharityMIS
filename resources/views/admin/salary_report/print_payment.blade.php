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
                                                    <div id="details-user" class="content-section">
    
                                                        <div class="inv--head-section inv--detail-section">
                                                            <div class="row">
                                                                <div class="col-sm-6 ">
                                                                    <p class="inv-list-number mt-sm-3 mt-2"><span class="inv-title">Salary Payment Details</span></p>
                                                                    <p class="inv-created-date mt-sm-3"><span class="inv-title">Date: </span> <span class="inv-date">{{ Carbon\Carbon::parse(Carbon\Carbon::now())->format('Y-M-d h:i:s A') }}</span></p>
                                                                </div>

                                                                <div class="col-sm-6 col-12 mr-auto text-sm-end">
                                                                    <div class="float-end">
                                                                        <img class="rounded float-end" height="90px" width="90px" src="{{ asset('assets/src/assets/img/logo.png') }}" alt="logo">
                                                                    </div>
                                                                </div>                                                                
                                                            </div> 
                                                            
                                                        </div>

                                                        <div class="inv--product-table-section">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr></tr>
                                                                        <tr>
                                                                            <td><b>Full Name</b></td>
                                                                            <td>{{ $payment->user->first_name }}&nbsp;{{ $payment->user->last_name }}</td>
                                                                            <td><b>Email</b></td>
                                                                            <td>{{ $payment->user->email }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Phone</b></td>
                                                                            <td>{{ $payment->user->phone_number }}</td>
                                                                            <td><b>Address</b></td>
                                                                            <td>Khair khana, Kabul, Afghanistan</td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Present</b></td>
                                                                            <td>{{ $payment->present_days }} Days</td>
                                                                            <td><b>Blood Group</b></td>
                                                                            <td>O RH+</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Leave</b></td>
                                                                            <td>{{ $payment->leave_days }} Days</td>
                                                                            <td><b>Salary</b></td>
                                                                            <td>{{ $payment->salary }}&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="inv--detail-section inv--customer-detail-section">

                                                            <div class="row ms-5 mx-5">
    
                                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                                    <p class="inv-to">Payer</p>
                                                                </div>

                                                                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-end mt-sm-0 mt-5">
                                                                    <p class=" inv-to">Payable</p>
                                                                </div>
                                                                
                                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                                    <p class="text-dark">Signature: {{ Auth::user()->first_name }}&nbsp;{{ Auth::user()->last_name }}</p>
                                                                </div>
                                                                
                                                                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1 text-sm-end">
                                                                    <p class="text-dark">Signature: {{ $payment->user->first_name }}&nbsp;{{ $payment->user->last_name }}</p>
                                                                </div>

                                                            </div>
                                                            
                                                        </div>

                                                        <div class="inv--note">

                                                            <div class="row mt-4">
                                                                <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                                    <p>Note: {{ $payment->description }}</p>
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
                                                    <a href="javascript:void(0);" class="btn btn-secondary btn-print  action-print">Print</a>
                                                </div>
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="{{ route('salary-report.index') }}" class="btn btn-outline-info btn-edit">Cancel / Back</a>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
    </script>
    <script>
        document.querySelector('.action-print').addEventListener('click', function(event) {
            event.preventDefault();

            var id = '{{ $payment->id }}';
            $.ajax({
                url:'paid/'+id,
                method: 'post',
                success:function(data){
                    if(data.code == 0){
                        $.each(data.error, function(prefix, val){
                            console.log(val[0]);
                        });
                    }else{
                        window.print();
                    }
                }
            });
            /* Act on the event */
        });
    </script>
@endsection