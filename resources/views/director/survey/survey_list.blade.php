@extends('layouts.admin_layouts.base')
@section('custom_css_content')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('assets/src/assets/css/light/apps/invoice-list.css') }}" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('assets/src/assets/css/dark/apps/invoice-list.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/light/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/elements/alert.css') }}">
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('assets/src/plugins/src/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/src/plugins/src/sweetalerts2/sweetalerts2.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/editors/quill/quill.snow.css') }}">
    <link href="{{ asset('assets/src/assets/css/light/apps/mailbox.css') }}" rel="stylesheet" type="text/css" />
    @section('title', 'Survey List')
    <link href="{{ asset('assets/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/editors/quill/quill.snow.css') }}">
    <link href="{{ asset('assets/src/assets/css/dark/apps/mailbox.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Survey Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Surveys List</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            <div class="row " id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <table id="survey-table" class="table dt-table-hover" style="width:100%">
                            <div class="table_record">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column"> Record no. </th>
                                        <th>Username</th>
                                        <th>Father Name</th>
                                        <th>Gender</th>
                                        <th>Contact</th>
                                        <th>ID Card</th>
                                        <th>Course</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($surveys as $survey)
                                    <tr>
                                        <td class="checkbox-column"> 1 </td>
                                        <td>
                                            <a href="{{ route('single.user', $survey->id) }}" class="d-flex">
                                                <div class="usr-img-frame me-2 rounded-circle">
                                                    <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('images/surveys')}}/{{ $survey->photo }}">
                                                </div>
                                                <p class="align-self-center mb-0 user-name"> {{ $survey->first_name }}&nbsp;{{ $survey->last_name }} </p>
                                            </a>
                                        </td>
                                        <td>{{ $survey->father_name }}</td>
                                        @if($survey->gender == 1)
                                            <td>Male</td>
                                        @else
                                            <td>Female</td>
                                        @endif
                                        <td>
                                            <div class="inv-amount mb-1"><img src="{{ asset('assets/custom/phone.png') }}" width="28px" height="28px" alt="">{{ $survey->primary_phone_number }}</div>
                                            <a href="#" class="whatsappMsg"><img src="{{ asset('assets/custom/whatsApp.png') }}" width="25px" height="25px" alt="">{{ $survey->whatsapp_number }}</a>
                                        </td>
                                        <td>{{ $survey->id_card_number }}</td>
                                        <td>{{ $survey->course->name }}</td>
                                        <td class="status-column">
                                            @if($survey->status == 'approved')
                                            <span class="badge badge-light-info">Approved</span>
                                            @elseif($survey->status == 'rejected')
                                            <span class="badge badge-light-danger">Rejected</span>
                                            @else
                                            <span class="badge badge-light-success">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </div>
                            
                        </table>
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
    <script src="{{ asset('assets/src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    @include('director.survey.survey_js')
@endsection