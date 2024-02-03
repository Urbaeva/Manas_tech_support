<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin page</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />

    <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">  </head>
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
        @yield('content')
    </div>
</div>
<!-- Wrapper End-->
<footer class="iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
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
<script src="../assets/js/backend-bundle.min.js"></script>
<!-- Chart Custom JavaScript -->
<script src="../assets/js/customizer.js"></script>

<script src="../assets/js/sidebar.js"></script>

<!-- Flextree Javascript-->
<script src="../assets/js/flex-tree.min.js"></script>
<script src="../assets/js/tree.js"></script>

<!-- Table Treeview JavaScript -->
<script src="../assets/js/table-treeview.js"></script>

<!-- SweetAlert JavaScript -->
<script src="../assets/js/sweetalert.js"></script>

<!-- Vectoe Map JavaScript -->
<script src="../assets/js/vector-map-custom.js"></script>

<!-- Chart Custom JavaScript -->
<script src="../assets/js/chart-custom.js"></script>
<script src="../assets/js/charts/01.js"></script>
<script src="../assets/js/charts/02.js"></script>

<!-- slider JavaScript -->
<script src="../assets/js/slider.js"></script>

<!-- Emoji picker -->
<script src="../assets/vendor/emoji-picker-element/index.js" type="module"></script>


<!-- app JavaScript -->
<script src="../assets/js/app.js"></script>  </body>
</html>
