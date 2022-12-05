@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/plugins/css/light/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<style>
    #ft{
        background-color: white;
        border-radius: 10px;
        box-shadow: 20px;
    }
</style>
<link href="{{ asset('assets/src/assets/css/dark/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/assets/css/light/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    @section('title', 'Add Leave')
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Leave Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Leave</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
                
            <div class="account-settings-container layout-top-spacing">

                <div class="tab-content" id="animateLineContent-4">
                    <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                        <div class="row">
                            
                            <div class="section general-info col-xl-8 col-lg-8 col-md-10 offset-lg-2 offset-md-1 layout-spacing pt-5">
                                <form method="post" action="{{ route('th_leave.store') }}">
                                    @csrf
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-10 col-md-10 mt-md-0 mt-4 offset-md-1">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="setting_name">Leave Type <span class="text-danger">*</span></label>
                                                                <select name="leave_type" class="form-control">
                                                                    <option value="">Select Leave Type</option>
                                                                    @foreach ($types as $type)
                                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger">{{ $errors->first('leave_type') }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mt-3">
                                                            <div class="form-group">
                                                                <label for="from">From <span class="text-danger">*</span></label>
                                                                <input id="from" name="from" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date..">
                                                                <span class="text-danger">{{ $errors->first('from') }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mt-3">
                                                            <div class="form-group">
                                                                <label for="setting_name">To <span class="text-danger">*</span></label>
                                                                <input id="to" name="to" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date..">
                                                                <span class="text-danger">{{ $errors->first('to') }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 mt-3">
                                                            <div class="form-group">
                                                                <label for="setting_name">Leave Reason <span class="text-danger">*</span></label>
                                                                <textarea name="reason" class="form-control"></textarea>
                                                                <span class="text-danger">{{ $errors->first('reason') }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 mt-2">
                                                            <div class="form-group text-end">
                                                                <button type="submit" class="btn btn-secondary">Send Leave Request</button>
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

@endsection
@section('custom_js_content')
<script src="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.js') }}"></script>
<script>
    var f1 = flatpickr(document.getElementById('from'));
    var f1 = flatpickr(document.getElementById('to'));
</script>

@endsection