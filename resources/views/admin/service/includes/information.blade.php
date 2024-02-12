<div class="tab-pane fade active show" id="personal-information" role="tabpanel">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">{{ $service->title }}</h4>
            </div>
        </div>
        <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="col-lg-6">
                            <img class="crm-profile-pic " src="{{  asset('storage/' . $service->logo) }}"
                                 alt="profile-pic">
                        </div>
                    </div>
                </div>
                <div class=" row align-items mt-5">
                    <div class="col-6">
                        <h6>{{ $service->title }}</h6>
                        <p class="mt-2">{{ $service->description }}</p>
                    </div>
                    <div class="col-6">
                        <h6>{{ $service->title_tr }}</h6>
                        <p class="mt-2">{{ $service->description_tr }}</p>
                    </div>

                </div>


            <div class="card-body mt-5">
                @if(count($service->files) > 0)
                    <h4>Files</h4>
                    <div class="row table">
                        <table>
                            <tbody>
                            @foreach($service->files as $file)
                                <div class="">
{{--                                    <tr>--}}
                                        <td>
                                            <i class="fa-solid fa-file-lines" style="color: blue"></i>
                                            <span><a href="{{ asset('storage/'.$file->file) }}"
                                                     target="_blank">{{ $file->title }}</a></span>
                                        </td>
{{--                                    </tr>--}}
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                @if(count($service->videos) > 0)
                    <h4 class="mt-5">Videos</h4>
                    <div class="col-sm-12 mt-5">
                        @foreach($service->videos as $video)
                            <video width="640" height="360" controls>
                                <source src="{{ route('admin.service.getVideo', $video->id) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endforeach
                    </div>
                @endif

                @if(count($service->images) > 0)
                    <div class="col-sm-12 mt-5">
                        <h4 class="mt-5">Images</h4>
                        @foreach($service->images as $image)
                            <img style="border: 2px solid #ddd" src="{{ asset('storage/'.$image->image) }}" id="image" class="mr-3">
                        @endforeach
                    </div>
                @endif

            </div>

        </div>
    </div>
</div>
