@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<link href="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/plugins/css/light/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
     <!--  BEGIN CONTENT AREA  -->
     <div id="content" class="main-content">
        <div class="container">
            <div class="container">

                <!-- BREADCRUMB -->
                <div class="page-meta">
                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Inventory Section</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Item</li>
                        </ol>
                    </nav>
                </div>
                <!-- /BREADCRUMB -->
                
                <div class="row layout-top-spacing mx-auto">

                    <div id="basic" class="col-lg-12 layout-spacing mx-auto">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">                                
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Edit Item Form</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area mx-auto">
                                <form method="POST" action="{{ route('update.inventory') }}" class="mx-auto">
                                    @csrf
                                    <input type="hidden" value="{{ $inventory->id }}" name="id">
                                    <div class="row mx-auto">
                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                            <label for="tag_no">Tag No </label>
                                            <input type="text" value="{{ $inventory->tag_no }}" name="tag_no" id="tag_no" class="form-control" readonly>
                                            @error('tag_no')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                            <label for="category_id">Category </label>
                                            <select class="form-control" name="category_id" id="category_id">
                                                <option value="{{ $inventory->category->id }}">{{ $inventory->category->name }}</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                            <label for="office">Office </label>
                                            <select class="form-control" name="office" id="office">
                                                <option value="{{ $inventory->office }}">{{ $inventory->office }}</option>
                                                <option value="finance">Finance</option>
                                                <option value="library">Library</option>
                                            </select>
                                            @error('office')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="serial">Serial </label>
                                            <input type="text" value="{{ $inventory->serial }}" name="serial" id="serial" class="form-control">
                                            @error('serial')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="manufacture">Manufacture </label>
                                            <input type="text" value="{{ $inventory->manufacture }}" name="manufacture" id="manufacture" class="form-control">
                                            @error('manufacture')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="model">Model </label>
                                            <input type="text" value="{{ $inventory->model }}" name="model" id="model" class="form-control">
                                            @error('model')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="date_purchase">Date of Purchase </label>
                                            <input type="text" class="form-control flatpickr flatpickr-input active mb-3" value="{{ $inventory->date_purchase }}" name="date_purchase" id="date_purchase" placeholder="yyyy-mm-dd" />
                                            @error('date_purchase')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="checkout_instock">Stock </label>
                                            <select class="form-control" name="checkout_instock" id="checkout_instock">
                                                <option value="{{ $inventory->checkout_instock }}">{{ $inventory->checkout_instock }}</option>
                                                <option value="instock">Instock</option>
                                                <option value="outstock">Outstock</option>
                                            </select>
                                            @error('checkout_instock')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="quantity">Quantity </label>
                                            <input type="number" value="{{ $inventory->quantity }}" name="quantity" id="quantity" class="form-control">
                                            @error('quantity')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="total_cost_lc">Total Cost LC </label>
                                            <input type="text" value="{{ $inventory->total_cost_lc }}" name="total_cost_lc" id="total_cost_lc" class="form-control">
                                            @error('total_cost_lc')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="total_cost_usd">Total Cost USD </label>
                                            <input type="text" value="{{ $inventory->total_cost_usd }}" name="total_cost_usd" id="total_cost_usd" class="form-control">
                                            @error('total_cost_usd')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="donation_purchase">Donation Purchase </label>
                                            <select class="form-control" name="donation_purchase" id="donation_purchase">
                                                <option value="{{ $inventory->donation_purchase }}">{{ $inventory->donation_purchase }}</option>
                                                <option value="donation">Donation</option>
                                                <option value="purchase">Purchase</option>
                                            </select>
                                            @error('donation_purchase')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="location">Location </label>
                                            <input type="text" value="{{ $inventory->location }}" name="location" id="location" class="form-control">
                                            @error('location')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="vendor">Vendor </label>
                                            <input type="text" value="{{ $inventory->vendor }}" name="vendor" id="vendor" class="form-control">
                                            @error('vendor')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="condition">Condition </label>
                                            <input type="text" value="{{ $inventory->condition }}" name="condition" id="condition" class="form-control">
                                            @error('condition')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="age_in_year">Age in year </label>
                                            <input type="text" value="{{ $inventory->age_in_year }}" name="age_in_year" id="age_in_year" class="form-control">
                                            @error('age_in_year')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="useful_life">Useful Life </label>
                                            <input type="text" value="{{ $inventory->useful_life }}" name="useful_life" id="useful_life" class="form-control">
                                            @error('useful_life')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="current_value_lc">Current Value LC </label>
                                            <input type="text" value="{{ $inventory->current_value_lc }}" name="current_value_lc" id="current_value_lc" class="form-control">
                                            @error('current_value_lc')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="current_value_usd">Current Value USD </label>
                                            <input type="text" value="{{ $inventory->current_value_usd }}" name="current_value_usd" id="current_value_usd" class="form-control">
                                            @error('current_value_usd')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mt-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="form-control">{{ $inventory->description }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-3 float-end">Update Item</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!--  BEGIN FOOTER  -->
        <div class="footer-wrapper">
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
<script src="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.js') }}"></script>
<script>
    var f1 = flatpickr(document.getElementById('date_purchase'));
</script>
@endsection