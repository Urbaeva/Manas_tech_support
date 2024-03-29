@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="iq-edit-list usr-edit">
                            <ul class="iq-edit-profile d-flex nav nav-pills">
                                <li class="col-md-3 p-0">
                                    <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                        Personal Information
                                    </a>
                                </li>
                                <li class="col-md-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                        Change Password
                                    </a>
                                </li>

                                <li class="col-md-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#manage-contact">
                                        Manage Contact
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
                        <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Personal Information</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group row align-items-center">
                                            <div class="col-md-12">
                                                <div class="profile-img-edit">
                                                    <div class="crm-profile-img-edit">
                                                        <img class="crm-profile-pic rounded-circle avatar-100"
                                                             src="{{ asset('assets/images/user/1.jpg') }}"
                                                             alt="profile-pic">
                                                        <div class="crm-p-image bg-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="2"
                                                                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                                            </svg>
                                                            <input class="file-upload" type="file" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" row align-items-center">
                                            <div class="form-group col-sm-6">
                                                <label for="fname">Name:</label>
                                                <input type="text" class="form-control" id="fname" name="name"
                                                       value="{{ $user->name }}">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                       value="{{ $user->email }}">
                                            </div>
                                            @if(auth()->user()->getRoles()[$user->role] !== 'SUPER_ADMIN')
                                                <div class="form-group col-sm-6">
                                                    <label>Department</label>
                                                    <select class="form-control" name="role"
                                                            id="exampleFormControlSelect1">
                                                        @foreach($departments as $department)
                                                            <option value="{{ $department->id }}"
                                                                    {{ $department->id == optional($user->department)->id ? ' selected' : '' }}
                                                            >{{ $department->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('role')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            @endif
                                            <div class="form-group col-sm-6">
                                                <label>Role</label>
                                                <select class="form-control" name="role" id="exampleFormControlSelect1">
                                                    @foreach($roles as $id => $role)
                                                        <option value="{{ $id }}"
                                                                {{ $id == $user->role ? ' selected' : '' }}
                                                        >{{ $role }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                        <input type="reset" class="btn btn-outline-primary mr-2" value="Cancel">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Change Password</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.user.changePassword', $user->id) }}" method="POST" onsubmit="return validatePassword()">
                                        @csrf
                                        <div class="form-group">
                                            <label for="npass">New Password:</label>
                                            <input type="password" class="form-control" id="npass" name="npass" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="vpass">Verify Password:</label>
                                            <input type="password" class="form-control" id="vpass" name="vpass" required>
                                            <small id="passwordMatchMessage" style="color: red;"></small>
                                        </div>
                                        <button type="reset" class="btn btn-outline-primary mr-2">Cancel</button>
                                        <button type="submit" onclick="validatePassword()" class="btn btn-primary">Submit</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Manage Contact</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="cno">Contact Number:</label>
                                            <input type="text" class="form-control" id="cno" value="001 2536 123 458">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="text" class="form-control" id="email"
                                                   value="Barryjone@demo.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="url">Url:</label>
                                            <input type="text" class="form-control" id="url"
                                                   value="https://getbootstrap.com">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                        <input type="reset" class="btn btn-outline-primary mr-2" value="Cancel">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validatePassword() {
            var newPassword = document.getElementById("npass").value;
            var verifyPassword = document.getElementById("vpass").value;
            var passwordMatchMessage = document.getElementById("passwordMatchMessage");

            if (newPassword !== verifyPassword) {
                passwordMatchMessage.textContent = "Passwords do not match!";
                return false; // Stop form submission
            }

            passwordMatchMessage.textContent = ""; // Clear previous error message
            return true; // Allow form submission
        }
    </script>
@endsection
