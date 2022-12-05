@extends('layouts.admin_layouts.base')
@section('custom_css_content')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{  asset('assets/src/assets/css/light/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{  asset('assets/src/assets/css/dark/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('assets/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/editors/quill/quill.snow.css') }}">

    <link href="{{ asset('assets/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/editors/quill/quill.snow.css') }}">

    <link href="{{ asset('assets/src/assets/css/light/apps/mailbox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/src/assets/css/dark/apps/mailbox.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    @section('title', 'Show Contract')
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
                                                                
                                                                <div class="col-sm-6 text-md">
                                                                    <h3 class="inv-list-number mt-sm-3 pb-sm-2 mt-2"><span class="inv-title"></span>Contract of {{ $contract->user->first_name }}&nbsp;{{ $contract->user->last_name }}</h3>
                                                                    <p class="inv-created-date mt-sm-5 mt-3"><span class="inv-title">Contract type : </span> <span class="inv-date">{{ $contract->contract_type->name }}</span></p>
                                                                    <p class="inv-created-date"><span class="inv-title">From : </span> <span class="inv-date">{{ $contract->start_date }}</span></p>
                                                                    <p class="inv-created-date"><span class="inv-title">To : </span> <span class="inv-date">{{ $contract->end_date }}</span></p>
                                                                
                                                                </div>                                                                
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="inv--detail-section inv--customer-detail-section">
                                                            <h3 class="inv-to">Discription: </h3>
                                                            <p>{!! $contract->description !!}</p>    
                                                        </div>

                                                        <div class="inv--note">

                                                            <div class="row mt-4">
                                                                <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                                    <p>Note: Go to print you can print it. <span class="text-info">updated at: {{ $contract->updated_at }}</span></p>
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
        @include('layouts.admin_layouts.footer')
        <!--  END FOOTER  -->
    </div>
    <!--  END CONTENT AREA  -->
@endsection
@section('custom_js_content')
    <script src="{{ asset('assets/src/assets/js/apps/invoice-preview.js') }}"></script>
@endsection