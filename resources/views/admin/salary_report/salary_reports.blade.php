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
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Salary Payments Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Salary Payments List</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            <div class="row " id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <table id="report-table" class="table dt-table-hover" style="width:100%">
                            <div class="table_record">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column"> Record no. </th>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Present Days</th>
                                        <th>Leave Days</th>
                                        <th>Salary</th>
                                        <th>Tip</th>
                                        <th>Payer</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salary_reports as $salary_report)
                                    <tr>
                                        <td class="checkbox-column"> 1 </td>
                                        <td><a href="#"><span class="inv-number">#{{ $salary_report->id }}</span></a></td>
                                        <td>
                                            <a href="#" class="d-flex">
                                                <p class="align-self-center mb-0"> {{ $salary_report->user->first_name }}&nbsp;{{ $salary_report->user->last_name }}</p>
                                            </a>
                                        </td>
                                        <td><span class="inv-amount">{{ $salary_report->present_days }}</span></td>
                                        <td>{{ $salary_report->leave_days }}</td>
                                        <td>{{ $salary_report->salary }}</td>
                                        <td>{{ $salary_report->tip }}</td>
                                        <td>{{ $salary_report->payer->first_name }}</td>
                                        <td>
                                            @if($salary_report->status ==  'Pay')
                                                <a href="{{ route('salary-report.show', $salary_report->id) }}" class="badge badge-light-success">Pay</a>
                                            @else
                                                <span class="text-success">{{ $salary_report->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="delete_report badge badge-light-danger text-start confirm-{{ $salary_report->id }}" href="#" data-id="{{ $salary_report->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
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
            <p class="">Copyright ?? <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
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
        $(document).on('mouseenter', '.delete_report', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var selector = '.confirm-'+id;

            document.querySelector(selector).addEventListener('click', function(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'report delete?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // if confirmed course will be delete.
                        $.post({
                            url: "/salary-report/"+id,
                            success: function(res){
                                document.location.reload();
                            }
                        });
                    } // end confirmed
                });
            });
        });
    </script>
    @if(Session::has('payment_deleted'))
    <script>
        Swal.fire(
            'Deleted',
            '{{ Session::get('payment_deleted') }}',
            'success'
        );
    </script>
    @endif
    <script>
        var reportList = $('#report-table').DataTable({
            "dom": "<'inv-list-top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'l<'dt-action-buttons align-self-center'B>><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f<'toolbar align-self-center'>>>>" +
                "<'table-responsive'tr>" +
                "<'inv-list-bottom-section d-sm-flex justify-content-sm-between text-center'<'inv-list-pages-count  mb-sm-0 mb-3'i><'inv-list-pagination'p>>",

            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML=`
                <div class="form-check form-check-primary d-block new-control">
                    <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
                </div>`
            },
            columnDefs:[{
                targets:0,
                width:"30px",
                className:"",
                orderable:!1,
                render:function(e, a, t, n) {
                    return `
                    <div class="form-check form-check-primary d-block new-control">
                        <input class="form-check-input child-chk" type="checkbox" id="form-check-default">
                    </div>`
                },
            }],
            buttons: [
                {
                    text: 'Add New',
                    className: 'btn btn-primary',
                    action: function(e, dt, node, config ) {
                        window.location = '/salary-report/create';
                    }
                }
            ],
            "order": [[ 1, "asc" ]],
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10
        });

        $("div.toolbar").html('<button class="dt-button dt-delete btn btn-danger" tabindex="0" aria-controls="invoice-list"><span>Delete</span></button>');

        multiCheck(reportList);


        $('.dt-delete').on('click', function() {
            // Read all checked checkboxes
            $(".select-lesson:checked").each(function () {
                if (this.classList.contains('chk-parent')) {
                    return;
                } else {
                    $(this).parents('tr').remove();
                }
            });
        });
    </script>
    @if(Session::has('salary_payment'))
    <script>
        Swal.fire(
            'Added',
            '{{ Session::get('salary_payment') }}',
            'success'
        );
    </script>
    @endif
@endsection