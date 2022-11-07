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
                <div class="col-xl-8 col-lg-8 col-sm-8 layout-spacing">
                    <div  id="table-attend" class="widget-content widget-content-area">
                        @if(Session::has('message'))
                            <div class="alert alert-light-success alert-dismissible fade show border-0 mb-4" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <strong>Success</strong> {{session()->get('message')}}</button>
                            </div>
                        @endif
                        <table class="table table-hover">
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
                                    <td class="ps-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        <span class="table-inner-text">{{ $attend->created_at }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
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

            $.ajax({
                url: "{{ route('save.attendance') }}",
                method: 'post',
                data: {qrCodeResult: qrCodeResult},
                success: function(res){
                    switch (res.status) {
                        case 'success':
                            $('#table-attend').load(location.href+" #table-attend");
                            Swal.fire('Present', ''+res.result, 'success');
                            break;
                        case 'user_exist':
                            Swal.fire({
                                title: 'Present',
                                text: 'You already present.',
                                icon: 'warning',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Okay'
                            });
                            // console.log('You already present.');
                            break;
                        case 'not_exist':
                            Swal.fire({
                                title: 'Warning',
                                text: 'Doesn\'t exist.',
                                icon: 'warning',
                                confirmButtonColor: '#d33',
                                confirmButtonText: 'Okay'
                            });
                            // console.log('This user doesn\'t exist.');
                            break;
                        case 'time_out_AM':
                            Swal.fire(
                                'Time Out',
                                'You are time out in morning.',
                                'warning'
                            );
                            // console.log('You are time out in AM');
                            break;
                        case 'afternoon':
                            Swal.fire(
                                'Absent',
                                'You was\'t present in the morning.',
                                'warning'
                            );
                            // console.log('You wasn\'t present in the morning');
                            break;
                        case 'time_out_PM':
                            Swal.fire(
                                'Time Out',
                                'You are time out in afternoon.',
                                'warning'
                            );
                            // console.log('You are time out in PM');
                            break;
                        default:
                            console.log('Error Occurred.');
                            break;
                    }
                },
                error: function(err){
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
            "reader", { fps: 1, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    });
</script>
@endsection