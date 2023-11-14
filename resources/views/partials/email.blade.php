<div class="mail-action clearfix">
    <div class="float-start">
        <div class="d-inline-block">
            <a href="{{ route('Inboxes.index') }}" class="mail-back btn btn-primary btn-sm"><i
                    class="fa fa-arrow-left me-2"></i>Back</a>
        </div>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-refresh"></i> Refresh
            </button>
            <button type="button" class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-archive"></i> Archive
            </button>
            <button type="button" class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-trash"></i> Trash
            </button>
            <div class="btn-group d-none d-md-inline-block" role="group">
                <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Tags
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">Tags 1</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Tags 2</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Tags 3</a>
                    </li>
                </ul>
            </div>
            <div class="btn-group d-none d-md-inline-block" role="group">
                <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    More
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">Mark as read</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Mark as unread</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Spam</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Delete</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="float-end ms-auto">
        <a href="{{ route('Inboxes.forward', $id) }}" class="btn btn-secondary btn-sm"><i
                class="fa fa-mail-forward"></i></a>
    </div>
</div>
<div class="detail-header">
    <div class="media d-flex mb-3">
        <div class="float-start me-3">
            <img class="rounded-3" src="./avatar1.jpg" width="65" alt="" />
        </div>
        <div class="media-body w-100">
            <p class="mb-0">
                <strong class="text-muted me-1">From:</strong>
                <a class="text-default" href="mailto:{{ $email }}">{{ $email }}</a>
                <span class="text-muted text-sm float-end">{{ $sent }}</span>
            </p>
            <p class="mb-0">
                <strong class="text-muted me-1">To:</strong>Me
                <small class="text-muted float-end"><i class="zmdi zmdi-attachment me-1"></i>(2
                    files, 89.2 KB)
                </small>
            </p>
            <p class="mb-0">
                <strong class="text-muted me-1">CC:</strong>
                <a class="text-default" href="javascript:void(0);">{{ $subject }}</a>
            </p>
        </div>
    </div>
</div>
<div class="mail-cnt">
    <p><span class="fw-bold">Phone: </span>{{ $phone }}</p>
    <p>{{ $message }}</p>
    <hr />
    <strong>Click here to</strong>
    <a class="btn btn-link" href="{{ route('Inboxes.edit', $id) }}">Reply</a>
    or
    <a class="btn btn-link" href="{{ route('Inboxes.create') }}">Forward</a>
</div>