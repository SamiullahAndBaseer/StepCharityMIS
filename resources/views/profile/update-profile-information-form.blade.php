<form class="section general-info" id="updateProfileForm" action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="info">
        <h6 class="">General Information</h6>
        <div class="row">
            <div class="col-lg-11 mx-auto">
                <div class="row">
                    <div class="col-xl-2 col-lg-12 col-md-4">
                        <div class="profile-image  mt-4 pe-md-4">

                            <div class="img-uploader-content">
                                <input type="file" class="filepond"
                                    name="profile_photo" accept="image/png, image/jpeg, image/gif"/>
                            </div>
        
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4" id="refreshHere">
                        <div class="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control mb-3" name="first_name" placeholder="First Name" value="{{ Auth::user()->first_name }}">
                                        <span class="text-danger first_name_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control mb-3" name="last_name" placeholder="Last Name" value="{{ Auth::user()->last_name }}">
                                        <span class="text-danger last_name_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Phone </label>
                                        <input type="text" class="form-control mb-3" name="phone_number" placeholder="Write your phone number here" value="{{ Auth::user()->phone_number }}">
                                        <span class="text-danger phone_number_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control mb-3" name="email" id="email" placeholder="Write your email here" value="{{ Auth::user()->email }}">
                                        <span class="text-danger email_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="province">Province</label>
                                        <input type="text" class="form-control mb-3" id="province" placeholder="province" value="Kabul">
                                        <span class="text-danger province_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control mb-3" id="address" placeholder="Address" value="Khair khana" >
                                        <span class="text-danger address_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-1">
                                    <div class="form-group text-end">
                                        <button type="submit" class="btn btn-secondary">Save</button>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
