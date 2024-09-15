<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link" style="margin-right: 4px;">
        <img src="{{asset('assets/img/S.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: 100;">
        <span class="brand-text font-weight-light text-center"
            style="margin-right: 20px; font-weight: bolder">@lang("Clinic")</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset("assets/img/user1-128x128.jpg")}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a style="font-weight: bold" href="#" class="d-block">
                    {{auth()->user()->name??""}}</a>

            </div>
            <div class="info">
                <a href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="d-inline">
                    <i class="fa fa-sign-out-alt"></i>
                </a>
                <form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route("dashboard")}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            @lang('dashboard')
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            @lang("patients")
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('dashboard.patient.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang("All Patient") @endlang</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            @lang("Drugs")
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('dashboard.drug.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang("All Drugs")</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            @lang("prescriptions")
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('dashboard.prescription.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang("all prescriptions")</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            @lang("Detections")
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('dashboard.detection.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang("All Detections")</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.statement-today')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang("statements-today")</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>