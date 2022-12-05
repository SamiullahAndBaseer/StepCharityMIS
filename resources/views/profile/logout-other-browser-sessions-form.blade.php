<div class="section general-info">
    <div class="info" id="browsers">
        <div class="row">
            <div class="col-md-12 col-12">
                <h3>{{ __('Browser Sessions') }}</h3>
            </div>
            <div class="col-md-12 col-12">
                <p class="m-3">{{ __('Manage and log out your active sessions on other browsers and devices.') }}</p>
            </div>
            <div class="col-md-12 col-12">
                <div class="m-3">
                    {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
                </div>    
            </div>
        </div>
        @if (count($this->sessions) > 0)
        <div class="row">
            @foreach ($this->sessions as $session)
                <div class="col-md-12 ms-5 mt-3">
                    <div class="row">
                        @if ($session->agent->isDesktop())
                            <div class="col-md-1">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                    <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @else
                            <div class="col-md-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-500">
                                    <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <div class="ml-3">
                        <div class="text-sm text-gray-600">
                            {{ $session->agent->platform() ? $session->agent->platform() : 'Unknown' }} - {{ $session->agent->browser() ? $session->agent->browser() : 'Unknown' }}
                        </div>

                        <div>
                            <div class="text-xs text-gray-500">
                                {{ $session->ip_address }},

                                @if ($session->is_current_device)
                                    <span class="text-success">{{ __('This device') }}</span>
                                @else
                                    {{ __('Last active') }} {{ $session->last_active }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
        <div class="row">
            <div class="col-md-8 m-5">
                <button type="submit" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#logoutOtherModal" wire:click="confirmLogout" wire:loading.attr="disabled">
                    Log Out Other Browser Sessions
                </button>
            </div>
        </div>
    </div>
</div>
