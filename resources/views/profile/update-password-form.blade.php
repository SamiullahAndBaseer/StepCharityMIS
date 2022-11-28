<div class="section general-info payment-info">
    <form id="updatePasswordForm" method="POST" action="{{ route('update.password') }}" class="info">
        @csrf
        <h6 class="">Update Password</h6>
        <p>Ensure your account is using a long, random password to stay secure.</p>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="mb-2">
                    <label class="form-label">Current Password</label>
                    <input id="current_password" type="password" name="current_password" autocomplete="current-password" class="form-control">
                    <span class="text-danger current_password_error"></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-2">
                    <label class="form-label">New Password</label>
                    <input id="password" type="password" name="password" autocomplete="new-password" class="form-control">
                    <span class="text-danger password_error"></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-2">
                    <label class="form-label">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" class="form-control">
                    <span class="text-danger password_confirmation_error"></span>    
                </div>
            </div>

            <div class="col-12 col-md-12">
                <button type="submit" class="btn btn-primary float-end mt-4">Save</button>
            </div>
        </div>
    </form>
</div>
