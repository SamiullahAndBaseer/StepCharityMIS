<x-guest-layout>
    <div class="row">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
            <div class="card mt-3 mb-3">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            
                            <h2>Sign In</h2>
                            <p>Enter your email and password to login</p>
                            @if (session('status'))
                                <div class="text-danger">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="text-danger">
                                <x-jet-validation-errors />
                            </div>
                        </div>


                        <form method="POST" action="{{route('login')}}">
                            @csrf
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required autofocus />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required autocomplete="current-password" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <div class="form-check form-check-primary form-check-inline">
                                    <input class="form-check-input me-3" type="checkbox" id="form-check-default" name="remember">
                                    <label class="form-check-label" for="form-check-default">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-secondary w-100">SIGN IN</button>
                            </div>
                        </div>

                        @if(Route::has('password.request'))
                            <div class="col-12">
                                <div class="text-center">
                                    <p class="mb-0"><a href="{{route('password.request') }}" class="text-warning">Forgot your password?</a></p>
                                </div>
                            </div>
                        @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>