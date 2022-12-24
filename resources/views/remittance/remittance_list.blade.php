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
    @section('title', 'Remittances List')
    <link href="{{ asset('assets/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/editors/quill/quill.snow.css') }}">
    <link href="{{ asset('assets/src/assets/css/light/apps/mailbox.css') }}" rel="stylesheet" type="text/css" />

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
                        <li class="breadcrumb-item"><a href="#">Remittance Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Remittances List</li>
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
                                        <th>Sender</th>
                                        <th>Receiver</th>
                                        <th>Remittance Number</th>
                                        <th>Amount</th>
                                        <th>Date of Send</th>
                                        <th>Date of Receive</th>
                                        <th>Status</th>
                                        @if(Auth::user()->role->name === 'admin')
                                        <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($remittances as $remittance)
                                    <tr>
                                        <td class="checkbox-column"> 1 </td>
                                        <td><p class="align-self-center mb-0 user-name"> {{ $remittance->senderUser->first_name }}&nbsp;{{ $remittance->senderUser->last_name }} </p></td>
                                        <td><p class="align-self-center mb-0 user-name"> {{ $remittance->receiverUser->first_name }}&nbsp;{{ $remittance->receiverUser->last_name }} </p></td>
                                        <td>{{ $remittance->remittance_number }}</td>
                                        <td>{{ $remittance->amount }}</td>
                                        <td>{{ $remittance->date_of_remittance }}</td>

                                        @if($remittance->date_of_receive != null)
                                            <td>{{ $remittance->date_of_receive }}</td>
                                        @else
                                            <td>Not received</td>
                                        @endif
                                        
                                        <td>
                                            @if($remittance->status == 'Received')
                                                <span class="text-success">{{ $remittance->status }}</span>
                                            @else
                                                <span id="yes_appr-{{ $remittance->id }}" class="on_received badge badge-info" data-id="{{ $remittance->id }}">{{ $remittance->status }}</span>
                                            @endif
                                        </td>
                                        @if(Auth::user()->role->name === 'admin')
                                        <td>
                                            @if($remittance->status != 'Received')
                                            <a class="badge badge-light-primary text-start me-2 action-edit" href="{{ route('remittance.edit', $remittance->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                            @endif
                                            <button class="delete badge badge-light-danger text-start confirm-{{ $remittance->id }}" data-id="{{ $remittance->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                                        </td>
                                        @endif
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
    <script src="{{ asset('assets/src/assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    @include('remittance.remittance_js')
    @if(Session::has('remittance_deleted'))
    <script>
        Swal.fire(
            'Deleted',
            "{{ Session::get('remittance_deleted') }}",
            'success',
        );
    </script>
    @endif
    @if(Session::has('remittance_send'))
    <script>
        Swal.fire(
            'Added',
            "{{ Session::get('remittance_send') }}",
            'success',
        );
    </script>
    @endif
    @if(Session::has('remittance_received'))
    <script>
        Swal.fire(
            'Received',
            "{{ Session::get('remittance_received') }}",
            'success',
        );
    </script>
    @endif
    @if(Session::has('remittance_edit'))
    <script>
        Swal.fire(
            'Updated',
            "{{ Session::get('remittance_edit') }}",
            'success',
        );
    </script>
    @endif
@endsection