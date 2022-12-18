@extends('layouts.admin_layouts.base')
@section('custom_css_content')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('assets/src/assets/css/light/apps/invoice-list.css') }}" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('assets/src/assets/css/dark/apps/invoice-list.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/light/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/elements/alert.css') }}">
    
    <script src="{{ asset('assets/src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/src/assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    @section('title', 'Lessons')
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Education Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Lessons</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            <div class="row " id="cancel-row">
                
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
                    @if(session()->has('saved'))
                        <div class="alert alert-light-success alert-dismissible fade show border-0 mb-4" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                            <strong>Success</strong> {{session()->get('saved')}}</button>
                        </div>
                    @endif
                    <div class="widget-content widget-content-area br-8">
                        <table id="lessons-table" class="table dt-table-hover" style="width:100%">
                            <div class="table_record">
                                @if(session()->has('lesson_deleted'))
                                    <div class="alert alert-light-success alert-dismissible fade show border-0 mb-4" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                        <strong>Success</strong> {{session()->get('lesson_deleted')}}</button>
                                    </div>
                                @endif
                                <thead>
                                    <tr>
                                        <th class="checkbox-column"> Record no. </th>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Teacher</th>
                                        <th>Course</th>
                                        <th>Material</th>
                                        <th>Add Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lessons as $lesson)
                                    <tr>
                                        <td class="checkbox-column"> 1 </td>
                                        <td><a href="#"><span class="inv-number">#{{ $lesson->id }}</span></a></td>
                                        <td>
                                            <a href="#" class="d-flex">
                                                <p class="align-self-center mb-0 user-name"> {{ $lesson->title }} </p>
                                            </a>
                                        </td>
                                        <td><span class="inv-amount">{{ $lesson->user->first_name }}&nbsp;{{ $lesson->user->last_name }}</span></td>
                                        <td><span class="inv-amount">{{ $lesson->course->name }}</span></td>
                                        <td>
                                            @php $ext = explode('.', $lesson->material);
                                                if(end($ext) == 'pdf'){
                                                    $icon = 'pdf-file.png';
                                                } elseif (end($ext) == 'xls') {
                                                    $icon = 'xls.png';
                                                } elseif (end($ext) == 'docx') {
                                                    $icon = 'docx.png';
                                                } elseif (end($ext) == 'csv') {
                                                    $icon = 'csv.png';
                                                } elseif (end($ext) == 'zip') {
                                                    $icon = 'zip.png';
                                                } elseif(end($ext) == 'jpg' || end($ext) == 'jpeg' || end($ext) == 'png') {
                                                    $icon = 'image-icon.png';
                                                } else {
                                                    $icon = 'file.png';
                                                }
                                            @endphp
                                            <a href="{{ asset('files/lessons') }}/{{ $lesson->material }}" class="text-info">
                                                <img src="{{ asset('assets/custom') }}/{{ $icon }}" width="35px" height="35px" alt="{{ $lesson->material }}">
                                                {{ $lesson->material }}
                                            </a>
                                        </td>
                                        <td><span class="inv-date"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> {{ $lesson->created_at }} </span></td>
                                        <td>
                                            <a class="badge badge-light-primary text-start me-2 action-edit" href="{{ route('lesson.edit', $lesson->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                            <a class="delete_lesson badge badge-light-danger text-start confirm-{{ $lesson->id }}" href="#" data-id="{{ $lesson->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
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
    <div class="footer-wrapper mt-0">
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
@section('custom_js_content')
    <script src="{{ asset('assets/custom/lessons/js/datatable.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
    </script>
    <script>
        $(document).on('mouseenter', '.delete_lesson', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var selector = '.confirm-'+id;

            document.querySelector(selector).addEventListener('click', function(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'this lesson delete?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // if confirmed course will be delete.
                        $.post({
                            url: "/lesson/"+id,
                            success: function(res){
                                document.location.reload();
                            }
                        });
                        // $.ajax({
                        //     url: "/lesson/"+id,
                        //     method: 'delete',
                        //     DataType: 'json',
                        //     success: function(response){
                        //         console.log($("#invoice-list").DataTable().ajax.reload());
                        //         // if(res.status == 'success'){
                        //         //     // $(this).parents('tr').remove();
                        //         //     console.log($("#invoice-list").DataTable().ajax.reload());
                        //         // }
                        //     }
                        // });
                    } // end confirmed
                });
            });
        });
    </script>
    @if(Session::has('lesson_deleted'))
    <script>
        Swal.fire(
            'Deleted!',
            'Lesson has been deleted.',
            'success'
        );
    </script>
    @endif
@endsection