@extends('layouts.admin_layouts.base')
@section('content')
<script src="{{ asset('assets/custom/js/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('assets/custom/js/html5-qrcode.min.js') }}"></script>

<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">
            
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Applications</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Attendance</li>
                    </ol>
                </nav>
            </div>
            
            <div class="row layout-top-spacing">
                <div class="col-xl-8 col-lg-8 col-sm-8  layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th class="ps-0" scope="col">Full Name</th>
                                    <th scope="col">Time IN</th>
                                    <th scope="col">Time OUT</th>
                                    <th class="text-center" scope="col">Status</th>
                                    <th class="text-center" scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attends as $attend)
                                <tr>
                                    <td>{{ $attend->id }}</td>
                                    <td class="ps-0">{{ $attend->users->first_name }}&nbsp;{{ $attend->users->last_name }}</td>
                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        <span class="table-inner-text">{{ Carbon\Carbon::parse($attend->time_in)->format("h:i:s A") }}</span>
                                    </td>
                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        <span class="table-inner-text">{{ $attend->time_out }}</span>
                                    </td>
                                    <td class="text-center" id="result">
                                        <span class="badge badge-light-success">Present</span>
                                    </td>
                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        <span class="table-inner-text">{{ $attend->created_at }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-4 layout-spacing">
                    <div class="errMsgContainer"></div>
                    <div id="reader"></div>
                </div>
            </div>

        </div>
        
    </div>
    
    <!--  BEGIN FOOTER  -->
    <div class="footer-wrapper mt-0">
        <div class="footer-section f-section-1">
            <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function(){

        function onScanSuccess(qrCodeMessage) {
            let qrCodeResult = qrCodeMessage;
            console.log(qrCodeMessage);
            // document.getElementById('result').innerHTML = '<span class="result">'+qrCodeMessage+'</span>';
            
            $.ajax({
                url: "{{ route('save.attendance') }}",
                method: 'post',
                data: {qrCodeResult: qrCodeResult},
                success: function(res){
                    if(res.status == 'success'){
                        $('.table').load(location.href+" .table");
                    }else if(res.status == 'user_exist'){
                        console.log('You already present.');
                    }else if(res.status == 'time_out_AM'){
                        console.log('You are time out in AM');
                    }else if(res.status == 'afternoon'){
                        console.log('afternoon');
                    }else if(res.status == 'time_out_PM'){
                        console.log('You are time out in PM');
                    }
                },
                error: function(err){
                    console.log(err);
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value){
                        $('.errMsgContainer').append("<span class='text-danger'>"+value+"</span><br>");
                    });
                }
            });
        }

        function onScanError(errorMessage) {
        //handle scan error
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    });
</script>
@endsection