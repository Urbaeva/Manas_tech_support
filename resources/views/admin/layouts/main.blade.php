<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin page</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/backend.css?v=1.0.0') }}">


{{--    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />--}}
{{--    <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>--}}
</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      integrity="sha512-...">

<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

<body class="  ">
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->
<!-- Wrapper Start -->
<div class="wrapper">
    @include('admin.includes.sidebar')
    @include('admin.includes.navbar')
    <div class="content-page">
        @if(session('notification'))
            <div class="toast fade show bg-success text-white border-0 rounded p-2 mt-3" role="alert"
                 aria-live="assertive" aria-atomic="true" id="notification_id">
                <div class="toast-header bg-success text-white">
                    <svg class="bd-placeholder-img rounded mr-2" width="20" height="20"
                         xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                         role="img">
                        <rect width="100%" height="100%" fill="#fff"></rect>
                    </svg>
                    <strong class="mr-auto text-white">Notification</strong>
                    <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast"
                            aria-label="Close"><span aria-hidden="true" onclick="close_notification()">×</span>
                    </button>
                </div>
                <div class="toast-body">
                    {{session('notification')}}
                </div>
            </div>
        @endif
        @yield('content')
    </div>
</div>
<!-- Wrapper End-->
<footer class="iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="{{ asset('backend/privacy-policy.html') }}">Privacy Policy</a>
                    </li>
                    <li class="list-inline-item"><a href="{{ asset('backend/terms-of-service.html') }}">Terms of Use</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 text-right">
                    <span class="mr-1">
                        Copyright
                        <script>document.write(new Date().getFullYear())</script>© <a href="#" class="">Datum</a>
                        All Rights Reserved.
                    </span>
            </div>
        </div>
    </div>
</footer>    <!-- Backend Bundle JavaScript -->
<script src="{{ asset('assets/js/backend-bundle.min.js') }}"></script>
<!-- Chart Custom JavaScript -->
<script src="{{ asset('assets/js/customizer.js') }}"></script>

<script src="{{ asset('assets/js/sidebar.js') }}"></script>

<!-- Flextree Javascript-->
<script src="{{ asset('assets/js/flex-tree.min.js') }}"></script>
<script src="{{ asset('assets/js/tree.js') }}"></script>

<!-- Table Treeview JavaScript -->
<script src="{{ asset('assets/js/table-treeview.js') }}"></script>

<!-- SweetAlert JavaScript -->
<script src="{{ asset('assets/js/sweetalert.js') }}"></script>

<!-- Vectoe Map JavaScript -->
<script src="{{ asset('assets/js/vector-map-custom.js') }}"></script>

<!-- Chart Custom JavaScript -->
<script src="{{ asset('assets/js/chart-custom.js') }}"></script>
<script src="{{ asset('assets/js/charts/01.js') }}"></script>
<script src="{{ asset('assets/js/charts/02.js') }}"></script>

<!-- slider JavaScript -->
<script src="{{ asset('assets/js/slider.js') }}"></script>

<!-- Emoji picker -->
<script src="{{ asset('assets/vendor/emoji-picker-element/index.js') }}" type="module"></script>


<!-- app JavaScript -->
<script src="{{ asset('assets/js/app.js') }}"></script>

<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>


<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
        $('#summernote2').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    });
    $(function () {
        bsCustomFileInput.init();
    });
</script>

<script>
    function close_notification()
    {
        document.getElementById('notification_id').outerHTML = '';
    }
</script>

</body>
</html>
