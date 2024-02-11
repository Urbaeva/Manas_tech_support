<div class="tab-pane fade" id="emailandsms" role="tabpanel">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Add image</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.service.addImage', $service->id) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="">
                    <div class="form-group col-6">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="title_tr">Title (tr):</label>
                        <input type="text" class="form-control" id="title_tr" name="title_tr" value="">
                        @error('title_tr')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-6">
                        <div class="card-body">
                            <p>Image:</p>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-outline-primary mr-2">Cancel</button>
                </div>
            </form>

            <div class="card-body mt-5 ">
                @foreach($service->images as $image)
                    <img src="{{ asset('storage/'.$image->image) }}" id="image" class="mr-3"><h4 class="card-title">{{ $image->title }}</h4>
                    <form action="{{ route('admin.image.delete', $image->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border-0 bg-transparent">
                            <i class="fas fa-trash text-danger " role="button"></i>
                            <span class="text-danger">Delete</span>
                        </button>
                    </form>
                @endforeach
            </div>

        </div>
    </div>

</div>
