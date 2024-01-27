<!-- Your HTML structure -->
<ul class="list-unstyled feeds_widget">
    @foreach($notifications as $notification)
    <li class="d-flex {{ $notification->type }}">
        <div class="feeds-left">
            <i class="{{ $notification->icon }}"></i>
        </div>
        <div class="feeds-body flex-grow-1">
            <h6 class="mb-1">
                {{ $notification->notification }}
                <small class="float-end text-muted small">{{ formatMyDate($notification->created_at) }}</small>
            </h6>
            <span class="text-muted">{{ $notification->message }}</span>
        </div>
    </li>
    @endforeach
</ul>