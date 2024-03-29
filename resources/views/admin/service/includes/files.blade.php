<div class="tab-pane fade" id="manage-contact" role="tabpanel">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Add file</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.service.addFile', $service->id) }}" method="POST"
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
                @if(count($service->files) > 0)
                    <h4>Files</h4>
                    <div class="row table">
                        <table>
                            <tbody>
                            @foreach($service->files as $file)
                                <tr>
                                    <td>
                                        <i class="fa-solid fa-file-lines" style="color: blue"></i>
                                        <span><a href="{{ asset('storage/'.$file->file) }}"
                                                 target="_blank">{{ $file->title }}</a></span>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.file.delete', $file->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="fas fa-trash text-danger ml-4" role="button"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
