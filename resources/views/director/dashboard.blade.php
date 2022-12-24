@extends('layouts.admin_layouts.base')
@section('custom_css_content')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('assets/src/plugins/src/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/src/assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/src/assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('assets/src/assets/css/light/components/list-group.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/src/assets/css/light/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/src/assets/css/dark/components/list-group.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/src/assets/css/dark/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <script src="{{ asset('assets/src/plugins/src/apex/apexcharts.min.js') }}"></script>
    @section('title', 'Director Dashboard')
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <div class="row layout-top-spacing">

                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        <div class="widget-heading">
                            <div class="">
                                <h5 class="">Users per Month</h5>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div id="attendancePerMonth"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-two">
                        <div class="widget-heading">
                            <h5 class="">Users by Category</h5>
                        </div>
                        <div class="widget-content">
                            <div id="user_by_category" class=""></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row widget-statistic">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                            <div class="widget widget-one_hybrid widget-leaves">
                                <div class="widget-heading">
                                    <div class="w-title">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        </div>
                                        <div class="">
                                            <p class="w-value">2</p>
                                            <h5 class="">Leaves</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">    
                                    <div class="w-chart">
                                        <div id="hybrid_followers"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                            <div class="widget widget-one_hybrid widget-absents">
                                <div class="widget-heading">
                                    <div class="w-title">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        </div>
                                        <div class="">
                                            <p class="w-value">10</p>
                                            <h5 class="">Absents</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">    
                                    <div class="w-chart">
                                        <div id="hybrid_followers1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                            <div class="widget widget-one_hybrid widget-engagement">
                                <div class="widget-heading">
                                    <div class="w-title">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        </div>
                                        <div class="">
                                            <p class="w-value">18</p>
                                            <h5 class="">Presents</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">    
                                    <div class="w-chart">
                                        <div id="hybrid_followers3"></div>
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
@endsection