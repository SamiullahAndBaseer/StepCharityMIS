@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{  asset('assets/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css" />
<link href="{{  asset('assets/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="container">
        <div class="container">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Categories</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->

            <div class="row layout-top-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                    <h4>Categories</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="5%">
                                                <div class="form-check form-check-primary">
                                                    <input class="form-check-input" id="hover_parent_all" type="checkbox">
                                                </div>
                                            </th>
                                            <th class="ps-0" scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th class="text-center" scope="col">Created at</th>
                                        </tr>
                                        <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-primary">
                                                    <input class="form-check-input hover_child" type="checkbox">
                                                </div>
                                            </td>
                                            <td class="ps-0">{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                                <span class="table-inner-text">{{ $category->created_at }}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    <script src="{{ asset('assets/src/plugins/src/highlight/highlight.pack.js') }}"></script>
@endsection