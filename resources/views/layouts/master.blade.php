<!DOCTYPE html>
<html>

<head>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include("layouts.head")
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="font-family: 'Cairo', sans-serif">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('assets/img/R.png')}}" alt="R.png"height="150"
             width="150">
        <h1 style="font-weight: bolder; font-style: italic">Dr.SAMIR EL SHAMLY</h1>
    </div>

    @include("layouts.main-headbar")
    @include("layouts.main-sidebar")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- /.content-header -->

        <!-- Main content -->
        @include("layouts.flash-massage")

        @yield("content")
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    @include("layouts.footer")

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layouts.footer-script')
</body>
</html>
