<div class="dropdown-item">
    <div class="media server-log">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
        
        <div class="media-body">
            @if(Auth::user()->role->name === 'admin')
            <div class="data-info">
                @if($notification->read_at)
                    <a href="{{ route('single.user', $notification->data['user_id']) }}"><h6>{{ $notification->data['name'] }} wants {{ $notification->data['leave_type'] }} leave.</h6></a>
                @else
                    <a href="{{ route('single.user', $notification->data['user_id']) }}"><h6><b>{{ $notification->data['name'] }} wants {{ $notification->data['leave_type'] }} leave.</b></h6></a>
                @endif
                <p class="">{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</p>
            </div>
            @else
            <div class="data-info">
                @if($notification->read_at)
                    <a href="/your-leaves"><h6>Your {{ $notification->data['leave_type'] }} leave {{ $notification->data['name'] }}</h6></a>
                @else
                    <a href="/your-leaves"><h6><b>Your {{ $notification->data['leave_type'] }} leave {{ $notification->data['name'] }}</b></h6></a>
                @endif
                <p class="">{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</p>
            </div>
            @endif


            <div class="icon-status delete-notification" data-notify_id="{{ $notification->id }}">
                <svg id="delete-{{ $notification->id }}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
        </div>
    </div>
</div>