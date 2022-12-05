@extends('layouts.admin_layouts.base')
@section('custom_css_content')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{  asset('assets/src/assets/css/light/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{  asset('assets/src/assets/css/dark/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('assets/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/editors/quill/quill.snow.css') }}">

    <link href="{{ asset('assets/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/editors/quill/quill.snow.css') }}">

    <link href="{{ asset('assets/src/assets/css/light/apps/mailbox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/src/assets/css/dark/apps/mailbox.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    @section('title', 'Single User')
    <style>
        .card{
            height: 3.575in;
            width: 2.475in;
            padding: 1.3rem 0 1 1.3rem 0;
            box-shadow: 0 0 5px #b4b4b4b4;
            background-image: url('{{ asset("assets/custom/ID-card.jpeg") }}');
            background-repeat: no-repeat;
            background-size: 238.4px 344px;
            border-radius: 10px;
        }
        .companyname{
            position: absolute;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 1.09rem;
            margin-top: .7rem;
            top: 4.3%;
            left: 3%;
            color: oldlace;
        }
        .company-img{
            position: absolute;
            top: 15%;
            left: 33%;
            max-width: 76px;
        }
        .profile-img{
            position: absolute;
            top: 37%;
            left: 26%;
            width: 116px;
            height: 116px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, .2)
        }
        .profile-name{
            position: absolute;
            top: 70%;
            font-weight: 400;
            font-size: 1.2rem;
            margin-top: .5rem;
            color: darkblue;
        }
        .profile-username{
            position: absolute;
            top: 78%;
            font-weight: 300;
            font-size: 1rem;
            margin-top: .6rem;
            text-align: center;
            color: navy;
        }
        .names{
            margin-left: 6%;
        }

        .squre-qr{
            position: absolute;
            align-items: center;
            top: 15%;
            left: 15%;
            box-shadow: 0 0 100px #76aabfb4;
        }

        .dt{
            top: 62%;
            position: absolute;
            font-weight: 400;
            font-size: 1.0rem;
            margin-top: .5rem;
            color: darkblue;
            left: 4%;
        }
        .dt1{
            top: 69%;
            position: absolute;
            font-weight: 400;
            font-size: 1.0rem;
            margin-top: .5rem;
            color: darkblue;
            left: 4%;
        }
        .dt2{
            top: 76%;
            position: absolute;
            font-weight: 400;
            font-size: 1.0rem;
            margin-top: .5rem;
            color: darkblue;
            left: 4%;
        }
    </style>
@endsection
@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">
                
                <div class="row invoice layout-top-spacing layout-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        
                        <div class="doc-container">

                            <div class="row">

                                <div class="col-xl-9">

                                    <div class="invoice-container">
                                        <div class="invoice-inbox">
                                            
                                            <div id="ct" class="">
                                                
                                                <div class="invoice-00001">
                                                    <div id="details-user" class="content-section">
    
                                                        <div class="inv--head-section inv--detail-section">

                                                            <div class="row">

                                                                <div class="col-sm-6 col-12 mr-auto">
                                                                    <div class="d-flex">
                                                                        <img class="rounded" height="150px" width="150px" src="{{ asset('images') }}/{{ $user->profile_photo_path }}" alt="{{ $user->first_name }}">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-sm-6 text-sm-end">
                                                                    <p class="inv-list-number mt-sm-3 pb-sm-2 mt-2"><span class="inv-title">{{  $user->first_name  }}&nbsp;{{ $user->last_name }} : </span> <span class="inv-number">#{{ $user->id }}</span></p>
                                                                    <p class="inv-created-date mt-sm-5 mt-3"><span class="inv-title">Email : </span> <span class="inv-date">{{ $user->email }}</span></p>
                                                                    <p class="inv-created-date"><span class="inv-title">Phone : </span> <span class="inv-date">{{ $user->phone_number }}</span></p>
                                                                </div>                                                                
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="inv--detail-section inv--customer-detail-section">
                                                            <h3 class="inv-to">Biography: </h3>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, excepturi esse vel dolore rerum at maxime maiores sed reiciendis totam quo modi. Sed ea et voluptatum ducimus sint iste repudiandae.</p>
                                                        </div>

                                                        <div class="inv--product-table-section">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr></tr>
                                                                        <tr>
                                                                            <td scope="col"><b>{{ $user->role->name }} ID</b></td>
                                                                            <td>{{ $user->id }}</td>
                                                                            <td><b>#Tazkira</b></td>
                                                                            <td>{{ $user->id_card_number }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Full Name</b></td>
                                                                            <td>{{ $user->first_name }}&nbsp;{{ $user->last_name }}</td>
                                                                            <td><b>Email</b></td>
                                                                            <td>{{ $user->email }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Father Name</b></td>
                                                                            <td>{{ $user->father_name }}</td>
                                                                            <td><b>Salary</b></td>
                                                                            <td>{{ $user->salary }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Phone</b></td>
                                                                            <td>{{ $user->phone_number }}</td>
                                                                            <td><b>Gender</b></td>
                                                                            @if($user->gender == 1)
                                                                                <td>Male</td>
                                                                            @else
                                                                                <td>Female</td>
                                                                            @endif
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Address</b></td>
                                                                            @if($user->district != null)
                                                                            <td>{{ $user->district->province->name }},&nbsp;{{ $user->district->name }},&nbsp;{{ $user->address }}</td>
                                                                            @else
                                                                            <td>
                                                                                {{ $user->first_name }}&nbsp;address here
                                                                            </td>
                                                                            @endif
                                                                            <td><b>Marital Status</b></td>
                                                                            @if($user->marital_status == 1)
                                                                                <td>Married</td>
                                                                            @else
                                                                                <td>Single</td>
                                                                            @endif
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Phone</b></td>
                                                                            <td>{{ $user->phone_number }}</td>
                                                                            <td><b>Blood Group</b></td>
                                                                            <td>O RH+</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b>Join Date</b></td>
                                                                            <td>{{ Carbon\Carbon::parse($user->join_date)->format('Y-M-d') }}</td>
                                                                            <td><b>Status</b></td>
                                                                            @if($user->status == 1)
                                                                            <td>Active</td>
                                                                            @else
                                                                            <td>Inactive</td>
                                                                            @endif
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="inv--detail-section inv--customer-detail-section">

                                                            <div class="row">
    
                                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                                    <p class="inv-to">Monthly Report </p>
                                                                </div>

                                                                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-end mt-sm-0 mt-5">
                                                                    <h6 class=" inv-to">{{ Carbon\Carbon::now()->format('Y-F') }}</h6>
                                                                </div>
                                                                
                                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                                    <p class="inv-customer-name text-success">Present</p>
                                                                    <p class="inv-customer-name">Leave</p>
                                                                    <p class="inv-email-address text-danger">Absent</p>
                                                                </div>
                                                                
                                                                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1 text-sm-end">
                                                                    <p class="inv-customer-name text-success">{{ $present_per_month }} Days</p>
                                                                    <p class="inv-customer-name">{{  $leave_per_month }} Days</p>
                                                                    <p class="inv-email-address text-danger">{{ $absent_per_month }} Days</p>
                                                                </div>

                                                            </div>
                                                            
                                                        </div>

                                                        <div class="inv--note">

                                                            <div class="row mt-4">
                                                                <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                                    <p>Note: Go to print page select custom type 2 for print only card.</p>
                                                                </div>
                                                            </div>

                                                        </div>
    
                                                    </div>

                                                    @if(Auth::user()->role->name === 'admin')
                                                    <div id="card-panel" class="content-section">
                                                        <div class="inv--head-section inv--detail-section">
                                                        
                                                            <div class="row" style="margin-bottom: 5%;">
                                                                <div class="col-2"></div>
                                                                <div class="col-sm-5 col-12 mr-auto">
                                                                    <div class="card">
                                                                        <div class="text-xenter">
                                                                            <div class="pp">
                                                                                <h4 class="companyname">Step Organiztion</h4>
                                                                                <img class="company-img" src="{{ asset('assets/src/assets/img/logo.png') }}" alt="">
                                                                                <img class="profile-img" src="{{ asset('images')}}/{{ $user->profile_photo_path }}" alt="">
                                                                            </div>
                                                                            <div class="names">
                                                                                <h2 class="profile-name">{{ $user->first_name }}</h2>
                                                                                <h4 class="profile-username">{{ $user->role->name }}</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5 col-12 mr-auto">
                                                                    <div class="card">
                                                                        <div class="pp">
                                                                            <h4 class="companyname">Step Organiztion</h4>
                                                                            <div class="squre-qr">
                                                                                {!! QrCode::size(160)->generate($user->id.', '.$user->email.', '.$user->phone_number) !!}
                                                                            </div>
                                                                            <div class="details">
                                                                                <h4 class="dt"><b>DoB: </b>{{ $user->date_of_birth }}</h4>
                                                                                <h4 class="dt1"><b>Moblie: </b>{{ $user->phone_number }}</h4>
                                                                                <h4 class="dt2"><b>Address: </b>Kabul, Kotali khair khana</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div> 
                                                
                                            </div>
    
    
                                        </div>
    
                                    </div>

                                </div>

                                <div class="col-xl-3">

                                    <div class="invoice-actions-btn">

                                        <div class="invoice-action-btn">

                                            <div class="row">
                                                @if(Auth::user()->role->name === 'admin')
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="javascript:void(0);" class="btn btn-primary btn-send" data-bs-toggle="modal" data-bs-target="#composeMailModal">Send Email</a>
                                                </div>
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="javascript:void(0);" class="btn btn-secondary btn-print  action-print">Print</a>
                                                </div>
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="javascript:void(0);" id="hide-card" style="display: none;" class="btn btn-light btn-download">Hide Card</a>
                                                    <a href="javascript:void(0);" id="card" class="btn btn-success btn-download">Show Card</a>
                                                </div>
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-dark btn-edit">Edit</a>
                                                </div>
                                                @else
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="javascript:void(0);" class="btn btn-secondary btn-print  action-print">Print</a>
                                                </div>
                                                @endif
                                            </div>

                                        </div>
                                        
                                    </div>
                                    
                                </div>

                            </div>
                            
                        </div>

                    </div>
                </div>

            </div>

        </div>

        @include('admin.users.email_modal')

        <!--  BEGIN FOOTER  -->
        @include('layouts.admin_layouts.footer')
        <!--  END FOOTER  -->
    </div>
    <!--  END CONTENT AREA  -->
@endsection
@section('custom_js_content')
    <script src="{{ asset('assets/src/assets/js/apps/invoice-preview.js') }}"></script>
    @if(Auth::user()->role->name === 'admin')
    <script>
        $(document).ready(function(){
            $('#card-panel').hide();
            $('#card').on('click', function(e){
                $('.content-section').hide();
                $('#card-panel').show();
                $('#hide-card').show();
                $('#card').hide();
            });

            $('#hide-card').on('click', function(e){
                $('#details-user').show();
                $('#card-panel').hide();
                $('#card').show();
                $('#hide-card').hide();
            });
            
            // for sending email
            $('#emailTo').val('{{ $user->email }}');

            $('#emailForm').on('submit', function(e){
                e.preventDefault();
                
                var form = this;

                $.ajax({
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data:new FormData(form),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function(){
                        $(form).find('span.validation-text').text('');
                    },
                    success:function(data){
                        if(data.code == 0){
                            $.each(data.error, function(prefix, val){
                                $(form).find('span.'+prefix+'_error').text(val[0]);
                            });
                        }else{
                            $('#composeMailModal').modal('hide');
                            Swal.fire(
                                'Sent',
                                data.msg,
                                'success'
                            );
                            $(form)[0].reset();
                        }
                    }
                });
            });
        });
    </script>
    @endif
@endsection