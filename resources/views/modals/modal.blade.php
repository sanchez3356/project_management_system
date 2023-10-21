<!-- resources/views/modals/modal.blade.php -->
<div class="modal fade" id="projectsAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        @if (Route::has('projects.store'))
        <form class="modal-content" method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
            @endif
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @csrf
            <div class="modal-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="row g-3 clearfix">
                    <div class="col-sm-12">
                        <input type="text" name="project_title"
                            class="form-control @error('project_title') is-invalid @enderror"
                            placeholder="Project Name *" value="{{ old('project_title') }}" />
                        @error('project_title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <select class="form-select @error('project_type') is-invalid @enderror" name="project_type"
                            aria-label="Default select example" value="{{ old('project_type') }}">
                            <option>Select project type</option>
                            @if(isset($projectTypes) && !empty($projectTypes))
                            @foreach($projectTypes as $projectType)
                            <option value="{{ $projectType->id }}">{{ $projectType->project_type }}</option>
                            @endforeach
                            @else
                            <option value="">No projects types available</option>
                            @endif
                        </select>
                        @error('project_type')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <select class="form-select @error('client') is-invalid @enderror" name="client"
                            aria-label="Default select example" value="{{ old('client') }}">
                            <option>Select Client Name</option>
                            @if(isset($clients) && !empty($clients))
                            @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->username }}</option>
                            @endforeach
                            @else
                            <option value="">No clients available</option>
                            @endif
                            <!-- <option>Core Technolab Pvt.</option>
                            <option>vPro Infoweb LLC.</option>
                            <option>M2 Solution Pvt. Ltd.</option> -->
                        </select>
                        @error('client')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <input type="number" name="rate" class="form-control @error('rate') is-invalid @enderror"
                            placeholder="Rate in Ksh *" value="{{ old('rate') }}" />
                        @error('rate')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="datepicker">
                            <input type="date" name="start_date" data-provide="datepicker" data-date-autoclose="true"
                                class="form-control
    @error('start_date') is-invalid @enderror" placeholder="Start Date *" value="{{ old('start_date') }}" />
                            @error('start_date') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="datepicker">
                            <input type="date" name="end_date" data-provide="datepicker" data-date-autoclose="true"
                                class="form-control @error('end_date') is-invalid @enderror" placeholder="End Date *"
                                value="{{ old('end_date') }}" />
                            @error('end_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <select class="form-select @error('priority') is-invalid @enderror" name="priority"
                            aria-label="Default select example" value="{{ old('priority') }}">
                            <option>Select Priority</option>
                            <option>High</option>
                            <option>Medium</option>
                            <option>Low</option>
                        </select>
                        @error('priority')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <input type="file" id="file-upload" name="project_image" value="{{ old('project_image') }}"
                            class="dropify @error('project_image') is-invalid @enderror" data-height="150" />
                        <div class="mt-3"></div>
                        @error('project_image')
                        @foreach ($errors->get('project_image') as $error)
                        <div class="text-danger">{{ $error }}</div>
                        @endforeach
                        <!-- <div class="text-danger">{{ $message }}</div> -->
                        @enderror
                    </div>
                    <div class="col-sm-12">
                        <textarea name="project_description" id="summernote">{{ old('project_description') }}</textarea>
                        @error('project_description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                    <button type="submit" class="btn btn-outline-secondary">
                        Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- add project task modal  -->
<div class="modal fade" id="taskModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="form">
        <form id="task_form" class="modal-content" method="POST" action="{{ route('tasks.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h6 class="title" id="taskModalLabel">Add New Task</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <input type="hidden" name="phase">
                    <div class="col-12">
                        <input type="text" name="task" class="form-control @error('task') is-invalid @enderror"
                            placeholder="Task *" value="{{ old('task') }}" />
                        <div class="text-danger" id="task-error"></div>
                    </div>
                    <div class="col-12">
                        <textarea rows="2" name="description" id="description" class="form-control"
                            placeholder="Please describe the task ..."></textarea>
                        <div class="text-danger" id="description-error"></div>
                    </div>
                    <div class="col-12">
                        <input type="date" name="deadline" class="form-control @error('deadline') is-invalid @enderror"
                            placeholder="Deadline *" value="{{ old('deadline') }}" />
                        <div class="text-danger" id="deadline-error"></div>
                    </div>
                    <div class="col-12">
                        <select name="status" class="form-select" aria-label="Default select example">
                            <option>Task Status</option>
                            <option value="planned">Plannned</option>
                            <option value="in progress">In progress</option>
                            <option value="complete">Complete</option>
                        </select>
                        <div class="text-danger" id="status-error"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning"><i class="fa fa-link"></i></button>
                <button class="btn btn-warning"><i class="fa fa-camera"></i></button>
                <button type="submit" class="btn btn-success">Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
<!-- add project task modal  -->
<!-- delete modal  -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
    aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- delete modal  -->


<!-- add Account Record modal  -->
<div class="modal fade" id="addAccount" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" id="account_form" method="POST" action="{{ route('accounts.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Add New Account</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-12">
                        <input type="text" name="account" class="form-control @error('account') is-invalid @enderror"
                            placeholder="Account name .*" value="{{ old('account') }}" required />
                        <div class="text-danger" id="account-error"></div>
                    </div>
                    <div class="col-12">
                        <input type="number" name="balance" class="form-control" placeholder="Account Balance"
                            value="{{ old('balance') }}" />
                        <div class="text-danger" id="balance-error"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Account</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
            </div>
        </form>
    </div>
</div>
<!-- add Account Record modal  -->
<!-- add Transaction Record modal  -->
<div class="modal fade" id="addTransaction" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" id="transaction_form" method="POST" action="{{ route('finances.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">New Transaction record</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-12">
                        <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror"
                            placeholder="Transaction amount .*" value="{{ old('amount') }}" required />
                        <div class="text-danger" id="amount-error"></div>
                    </div>
                    <div class="col-12">
                        <input type="date" name="date" class="form-control" placeholder="Transaction Date"
                            value="{{ old('date') }}" />
                        <div class="text-danger" id="date-error"></div>
                    </div>
                    <div class="col-12">
                        <select name="method" class="form-select" aria-label="Default select example">
                            <option>Transaction method</option>
                            <option value="credit card">Credit card</option>
                            <option value="mpesa">Mpesa</option>
                            <option value="cash">Cash</option>
                            <option value="paypal">Paypal</option>
                        </select>
                        <div class="text-danger" id="method-error"></div>
                    </div>
                    <div class="col-12">
                        <select name="type" class="form-select" aria-label="Default select example">
                            <option>Transaction type</option>
                            <option value="income">Income</option>
                            <option value="expenditure">Expenditure</option>
                        </select>
                        <div class="text-danger" id="description-error"></div>
                    </div>
                    <div class="col-12">
                        <textarea rows="2" name="description" id="description" class="form-control"
                            placeholder="Please describe transaction ..."></textarea>
                        <div class="text-danger" id="description-error"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
            </div>
        </form>
    </div>
</div>
<!-- add Transaction Record modal  -->