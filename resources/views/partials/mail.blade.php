<ul class="list-unstyled mb-0 list">
    @foreach($messages as $message)
    @php
    $status = $message->read ? 'read' : 'unread';
    $spam = $message->spam ? 'active' : 'inactive';
    @endphp
    <li class="clearfix mb-1 {{ $status }}">
        <div class="mail-detail-left float-start">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault{{ $message->id }}" />
                <label class="form-check-label" for="flexCheckDefault{{ $message->id }}"></label>
            </div>
            <a href="javascript:void(0);" class="mail-star {{ $spam }}"><i class="fa fa-star"></i></a>
        </div>
        <div class="mail-detail-right float-start">
            <h6 class="sub">
                <a href="mailto:{{ $message->email }}" class="mail-detail-expand">{{ $message->first_name }}
                    {{ $message->last_name }}</a>
                <span class="badge bg-secondary mb-0">{{ $message->subject }}</span>
            </h6>
            <p class="dep">
                <span class="">[{{ $message->phone }}]</span> {{ $message->message }}
            </p>
            <span class="time">{{ formatMyDate($message->created_at) }}</span>
        </div>
        <div class="hover-action">
            <a class="btn btn-warning mr-2" href="javascript:void(0);"
                data-url="{{ route('Inboxes.show', $message->id) }}"><i class="fas fa-eye"></i></a>
            <button type="button" class="btn btn-danger delete-item" title="Delete"
                data-route="{{ route('Inboxes.destroy', $message->id) }}">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </li>
    @endforeach
</ul>