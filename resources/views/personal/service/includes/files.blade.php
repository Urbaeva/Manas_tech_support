<div class="tab-pane fade" id="manage-contact" role="tabpanel">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Add file</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('personal.service.addFile', $service->id) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
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
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <div class="card-body">
                            <p>File:</p>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                <label class="custom-file-label" for="file">Choose file</label>
                            </div>
                            @error('file')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <div class="card-body">
                            <p>File tr:</p>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="file_tr" name="file_tr">
                                <label class="custom-file-label" for="file_tr">Choose file</label>
                            </div>
                            @error('file_tr')
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
                <div class="row">
                    @foreach($service->files as $file)
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="shadow-bottom p-4 shadow-showcase text-center">
                            <h5 style="color: blue"><a href="{{ asset('storage/'.$file->file) }}" target="_blank">{{ $file->title }}</a></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
