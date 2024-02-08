<div class="tab-pane fade active show" id="personal-information" role="tabpanel">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">{{ $service->title }}</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('personal.service.update', $service->id) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group row align-items-center">
                    <div class="col-md-12">
                        <div class="col-lg-6">
                            <img class="crm-profile-pic " src="{{  asset('storage/' . $service->logo) }}"
                                 alt="profile-pic">
                        </div>
                        <div class="col-lg-6">
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
                <div class=" row align-items-center">
                    <h6>{{ $service->title }}</h6>
                    <h6>{{ $service->title_tr }}</h6>

                    <p>{{ $service->description }}</p>
                    <p>{{ $service->description_tr }}</p>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('personal.service.index') }}" class="btn btn-outline-primary mr-2">Cancel</a>
            </form>

            <div class="card-body">
                @if(isset($service->files))
                    <div class="col-sm-12 mt-5">
                        <h5 class="mt-5">Files</h5>
                        @foreach($service->files as $file)
                            <a href="{{ asset('storage/'.$file->file) }}" target="_blank">{{ $file->title }}</a>
                        @endforeach
                    </div>
                @endif

                @if(isset($service->videos))
                    <h5 class="mt-5">Videos</h5>
                    <div class="col-sm-12 mt-5">
                        @foreach($service->videos as $video)
                            <video width="640" height="360" controls>
                                <source src="{{ route('personal.service.getVideo', $video->id) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endforeach
                    </div>
                @endif

                @if(isset($service->images))
                    <div class="col-sm-12 mt-5">
                        <h5 class="mt-5">Images</h5>
                        @foreach($service->images as $image)
                            <img src="{{ asset('storage/'.$image->image) }}" id="image" class="mr-3">
                        @endforeach
                    </div>
                @endif

            </div>

        </div>
    </div>
</div>
