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
                        <div class="profile-img-edit">
                            <div class="crm-profile-img-edit">
                                <img class="crm-profile-pic rounded-circle avatar-100"
                                     src="{{  asset('storage/' . $service->logo) }}" alt="profile-pic">
                                <div class="crm-p-image bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                    </svg>
                                    <input class="file-upload" type="file" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" row align-items-center">
                    <div class="form-group col-sm-6">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $service->title }}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="title_tr">Title (tr):</label>
                        <input type="text" class="form-control" id="title_tr" name="title_tr"
                               value="{{ $service->title_tr }}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description"
                               value="{{ $service->description }}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="description_tr">Description (tr):</label>
                        <input type="text" class="form-control" id="description_tr" name="description_tr"
                               value="{{ $service->description_tr }}">
                    </div>

                    <div class="form-group col-sm-6">

                    </div>
                    <div class="form-group col-sm-6">
                        <label>Category:</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}" {{ $category->id == $service->category_id ? ' selected' : ''}}
                                >{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.service.index') }}" class="btn btn-outline-primary mr-2">Cancel</a>
            </form>
        </div>
    </div>
</div>
