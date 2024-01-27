<div class="row">
    @foreach($imageUrls as $index => $image)
    <div class="col-md-3 mb-3 position-relative">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6>Image {{$index + 1}}</h6>
                <div class="form-check d-inline-block me-0 me-sm-3">
                    <input class="form-check-input image-checkbox" type="checkbox" value="{{ basename($image) }}"
                        id="flexCheck{{$index}}" />
                    <label class="form-check-label" for="flexCheck{{$index}}"></label>
                </div>
            </div>
            <div class="card-body">
                <img src="{{ $image }}" class="" width="200px" height="210px" alt="Image">
            </div>
            <div class="card-footer">
                <form action="{{ route('gallery.delete', basename($image)) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm mt-2 btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>