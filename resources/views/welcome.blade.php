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
                    <img src="https://logodownload.org/wp-content/uploads/2019/09/saudi-aramco-logo.png" class="w-75"
                         alt="User Image">
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
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
                    </div><!-- /.col -->
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container-fluid">
                {{-- Reports --}}
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$hol_count}}</h3>
                                <p>Holidays</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-candy-cane"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$resc_count}}</h3>
                                <p>Rescheduled days off</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-power-off"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$numberRe}}</h3>
                                <p>Response</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-reply"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>??</h3>
                                <p>??</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-question"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Send Notification</h3>
                            </div>
                            <div class="card-body">
                                {{$success}}
                                <form action="{{route('bulksend')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Notification Title" name="title" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Message</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Notification Description" name="body" autocomplete="off" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send Notification</button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">New Task</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('adminTask')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Task Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Notification Title" name="task_name" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="Date">Date</label>
                                        <input type="date" class="form-control" id="Date" placeholder="Date" name="task_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="Date">Time</label>
                                        <input type="time" class="form-control" id="Date" placeholder="Time" name="task_time">
                                    </div>
                                    <div class="form-group">
                                        <label for="Date">Users</label>
                                        <input type="text" class="form-control" id="Date" placeholder="users" name="users" autocomplete="off">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Users</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered text-xl-center">
                                    <thead>
                                    <tr class="text-bold">
                                        <th>username</th>
                                        <th>device_token</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $u)
                                        <tr>
                                            <td>{{$u->username}}</td>
                                            @if($u->device_token)
                                                <td style="overflow: hidden !important; max-width: 100px !important;">{{$u->device_token}}</td>
                                            @else
                                                <td>null</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Holidays</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered text-xl-center">
                                    <thead>
                                    <tr class="text-bold">
                                        <th>Date</th>
                                        <th>Hijri Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hol_dates as $h)
                                        <tr>
                                            <td>{{$h->date}}</td>
                                            <td>{{$h->H_date}}</td>
                                            <td>
                                                <button type="button" class="btn btn-default" data-toggle="modal"
                                                        data-target="#modal-{{$h->id}}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <form action="/{{$h->id}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-default" data-toggle="modal"
                                                            data-target="#modal-">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('editDate')
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Rescheduled days off</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered text-xl-center">
                                    <thead>
                                    <tr class="text-bold">
                                        <th>Date</th>
                                        <th>Hijri Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($resc_dates as $h)
                                        <tr>
                                            <td>{{$h->date}}</td>
                                            <td>{{$h->H_date}}</td>
                                            <td>
                                                <button type="button" class="btn btn-default" data-toggle="modal"
                                                        data-target="#modal-{{$h->id}}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <form action="/{{$h->id}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-default" data-toggle="modal"
                                                            data-target="#modal-">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('editDate')
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

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
    <div id="sidebar-overlay"></div>
</div>
</body>
</html>
