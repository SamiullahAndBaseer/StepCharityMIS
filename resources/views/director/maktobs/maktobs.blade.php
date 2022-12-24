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
    @section('title', 'Maktoob List')
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Maktob Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Maktob List</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            <div class="row " id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <table id="maktob-table" class="table dt-table-hover" style="width:100%">
                            <div class="table_record">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column"> Record no. </th>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Reference To</th>
                                        <th>Maktob Type</th>
                                        <th>Images</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($maktobs as $maktob)
                                    <tr>
                                        <td class="checkbox-column"> 1 </td>
                                        <td><a href="#"><span class="inv-number">#{{ $maktob->id }}</span></a></td>
                                        <td>
                                            <a href="#" class="d-flex">
                                                <p class="align-self-center mb-0"> {{ $maktob->title }} </p>
                                            </a>
                                        </td>
                                        <td>
                                            @if($maktob->status == 'received')
                                            <span class="badge outline-badge-success me-4">Received</span>
                                            @elseif($maktob->status == 'sent')
                                            <span class="badge outline-badge-info me-4">Sent</span>
                                            @else
                                            <span class="badge outline-badge-primary me-4">Sending</span>
                                            @endif
                                        </td>
                                        <td><span class="inv-amount">{{ $maktob->reference_to }}</span></td>
                                        <td>{{ $maktob->maktobType->name }}</td>
                                        <td>
                                            @php 
                                                $images = explode(',', $maktob->images);
                                            @endphp
                                            @foreach ($images as $image)    
                                                @if($image)
                                                <a href="{{ asset('files/maktobs') }}/{{ $image }}" class="text-info">
                                                    <img src="{{ asset('files/maktobs') }}/{{ $image }}" width="35px" height="35px" alt="{{ $maktob->image }}">
                                                </a>
                                                @endif
                                            @endforeach
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
    <script src="{{ asset('assets/custom/lessons/js/datatable.js') }}"></script>
    <script>
        var maktobList = $('#maktob-table').DataTable({
            "dom": "<'inv-list-top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'l<'dt-action-buttons align-self-center'B>><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f<'toolbar align-self-center'>>>>" +
                "<'table-responsive'tr>" +
                "<'inv-list-bottom-section d-sm-flex justify-content-sm-between text-center'<'inv-list-pages-count  mb-sm-0 mb-3'i><'inv-list-pagination'p>>",

            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML=`
                <div class="form-check form-check-primary d-block new-control">
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
                    </div>`
                },
            }],
            buttons: [
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
        multiCheck(maktobList);
    </script>
@endsection