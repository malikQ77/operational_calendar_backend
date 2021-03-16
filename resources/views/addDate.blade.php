<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Title</title>

    <link href="{{mix("css/app.css")}}" rel="stylesheet">
    <script src="{{mix("js/app.js")}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="hold-transition skin-blue fixed sidebar-mini sidebar-mini-expand-feature">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Privacy Policy</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-white elevation-4">
        <div class="sidebar">
            <div class="user-panel mt-3 pb-5 d-flex">
                <div class="image bg-white">
                    <img src="https://logodownload.org/wp-content/uploads/2019/09/saudi-aramco-logo.png" class="w-75" alt="User Image">
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="/create" class="nav-link">
                            <i class="fas fa-calendar-plus mr-2"></i>
                            <p>
                                Add Date
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper" style="min-height: 559px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Operational Calendar</h1>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add new Date</h3>
                            </div>
                            <form method="POST" action="/">
                                @csrf
                                <div class="card-body">

                                    @if($errors->any())
                                        @foreach($errors->all() as $error)
                                            <p style="color: #ff0000">{{ $error }}</p>

                                        @endforeach
                                    @endif
                                    <div class="form-group">
                                        <label for="Date">Date</label>
                                        <input type="date" class="form-control" id="Date" placeholder="Date" name="date">
                                    </div>
                                    <div class="form-group">
                                        <label for="H_Date">Hijri Date</label>
                                        <input type="date" class="form-control" id="H_Date" placeholder="Hijri Date" name="H_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="DateType">Date Type</label>
                                        <select class="form-control" name="type">
                                            <option selected disabled>Select Date Type</option>
                                            <option value="Holidays">Holidays</option>
                                            <option value="Rescheduled days off">Rescheduled days off</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Operational Calendar
        </div>
        <strong>Copyright © 2021 <a href="https://aramco.com">Saudi Aramco</a>.</strong> All rights reserved.
    </footer>
    <div id="sidebar-overlay"></div></div>
</body>
</html>
