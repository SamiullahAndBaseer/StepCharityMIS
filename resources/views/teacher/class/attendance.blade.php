@extends('layouts.admin_layouts.base')
@section('title', 'Attendance')
@section('custom_css_content')
<script src="{{ asset('assets/custom/js/html5-qrcode.min.js') }}"></script>
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">
            
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('class.index') }}">Attendance Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Class Attendance</li>
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
                                    <th scope="col">Course</th>
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
                                    <td>{{ $attend->course->name }}</td>
                                    <td class="text-center" id="result">
                                        <span class="badge badge-light-success">Present</span>
                                    </td>
                                    <td class="ps-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        <span class="table-inner-text">{{ Carbon\Carbon::parse($attend->created_at)->diffForHumans() }}</span>
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
                    <div class="row m-4">
                        <a href="{{ route('class.absents', $course->id) }}" class="btn btn-outline-info btn-rounded">Save Students Attendance</a>
                    </div>
                </div>
            </div>

        </div>
        
    </div>
    
    <!--  BEGIN FOOTER  -->
    @include('layouts.admin_layouts.footer')
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
            let course_id = '{{ $course->id }}';

            $.ajax({
                url: "{{ route('class.store') }}",
                method: 'post',
                data: {qrCodeResult: qrCodeResult, course_id: course_id},
                success: function(res){
                    switch (res.status) {
                        case 'success': // student present successfully
                            $('#table-attend').load(location.href+" #table-attend");
                            Swal.fire('Present', ''+res.result, 'success');
                            break;
                        case 'user_exist': // already exist
                            Swal.fire({
                                title: 'Present',
                                text: 'You already present.',
                                icon: 'warning',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Okay'
                            });
                            break;
                        case 'not_exist': // student don't in this class
                            Swal.fire({
                                title: 'Warning',
                                text: 'Doesn\'t exist.',
                                icon: 'warning',
                                confirmButtonColor: '#d33',
                                confirmButtonText: 'Okay'
                            });
                            // console.log('This user doesn\'t exist.');
                            break;
                        case 'time_out': // student time out
                            Swal.fire(
                                'Time Out',
                                'You are time out.',
                                'warning'
                            );
                            // console.log('You are time out');
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