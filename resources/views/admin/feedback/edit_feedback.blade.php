@extends('layouts.admin_layouts.base')
@section('custom_css_content')
<style>
    #ft{
        background-color: white;
        border-radius: 10px;
        box-shadow: 20px;
    }
</style>
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Feedback Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Feedback</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
                
            <div class="account-settings-container layout-top-spacing">

                <div class="tab-content" id="animateLineContent-4">
                    <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                        <div class="row">
                            @if (Session::has('feedback_updated'))
                            <div class="col-xl-8 col-lg-8 col-md-10 offset-lg-2 offset-md-1">
                                <div class="alert alert-light-success alert-dismissible fade show border-0 mb-4" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                    <strong>Success</strong> {{ session()->get('feedback_updated') }}</button>
                                </div>
                            </div>
                            @endif
                            <div id="ft" class="col-xl-8 col-lg-8 col-md-10 offset-lg-2 offset-md-1 layout-spacing pt-5">
                                <form class="section general-info" method="POST" action="{{ route('update.feedback', $feedback->id) }}">
                                    @csrf
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-10 col-md-10 mt-md-0 mt-4 offset-md-1">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title">Title <span class="text-danger">*</span></label>
                                                                <input value="{{ $feedback->title }}" name="title" class="form-control" type="text" placeholder="Feedback title..">
                                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="setting_name">Feedback Type <span class="text-danger">*</span></label>
                                                                <select name="feedback_type_id" class="form-control">
                                                                    <option value="{{ $feedback->feedback_type_id }}">{{ $feedback->feedback_type->name }}</option>
                                                                    @foreach ($feedback_types as $type)
                                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger">{{ $errors->first('feedback_type_id') }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 mt-3">
                                                            <div class="form-group">
                                                                <label for="setting_name">Description <span class="text-danger">*</span></label>
                                                                <textarea name="description" class="form-control" placeholder="Feedback description">{{ $feedback->description }}</textarea>
                                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 mt-2">
                                                            <div class="form-group text-end">
                                                                <button type="submit" class="btn btn-secondary">Update Feedback</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
    @if(Session::has('feedback_updated'))
    <script>
        Swal.fire(
            'updated!',
            'Feedback updated successfully.',
            'success'
        );
    </script>
    @endif
@endsection