@extends('personal.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="iq-edit-list usr-edit">
                            <ul class="iq-edit-profile d-flex nav nav-pills">
                                <li class="col-md-3 p-0">
                                    <a class="nav-link " data-toggle="pill" href="#personal-information">
                                        Service Information
                                    </a>
                                </li>
                                <li class="col-md-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                        Videos
                                    </a>
                                </li>
                                <li class="col-md-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#emailandsms">
                                        Images
                                    </a>
                                </li>
                                <li class="col-md-3 p-0">
                                    <a class="nav-link  " data-toggle="pill" href="#manage-contact">
                                        Files
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="iq-edit-list-data">
                    <div class="tab-content">
                       @include('personal.service.includes.information')
                       @include('personal.service.includes.videos')
                       @include('personal.service.includes.images')
                       @include('personal.service.includes.files')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
