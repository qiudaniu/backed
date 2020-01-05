<!DOCTYPE html>
<html lang=lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ URL::asset('public/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="{{ URL::asset('public/css/orionicons.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ URL::asset('public/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ URL::asset('public/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png?3') }}">
    <!-- Tweaks for older IEs-->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
<header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="{{ route('admin') }}" class="navbar-brand font-weight-bold text-uppercase text-base">后台管理系统</a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
            <li class="nav-item">
                <form id="searchForm" class="ml-auto d-none d-lg-block">
                    <div class="form-group position-relative mb-0">
                        <button type="submit" style="top: -3px; left: 0;" class="position-absolute bg-white border-0 p-0"><i class="o-search-magnify-1 text-gray text-lg"></i></button>
                        <input type="search" placeholder="Search ..." class="form-control form-control-sm border-0 no-shadow pl-4">
                    </div>
                </form>
            </li>
            <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="{{ URL::asset('public/img/avatar-6.jpg') }}" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</header>
<div class="d-flex align-items-stretch">
    <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">主页</div>
        <ul class="sidebar-menu list-unstyled">
            <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#nation" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>国家</span></a>
                <div id="nation" class="collapse">
                    <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                        <li class="sidebar-list-item"><a href="{{ url('admin/nation') }}" class="sidebar-link text-muted pl-lg-5">国家列表</a></li>
                        <li class="sidebar-list-item"><a href="{{ url('admin/nation/create') }}" class="sidebar-link text-muted pl-lg-5">新增国家</a></li>
                    </ul>
                </div>
            </li>
            <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#line" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>线路</span></a>
                <div id="line" class="collapse">
                    <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                        <li class="sidebar-list-item"><a href="{{ url('admin/line') }}" class="sidebar-link text-muted pl-lg-5">线路列表</a></li>
                        <li class="sidebar-list-item"><a href="{{ url('admin/line/create') }}" class="sidebar-link text-muted pl-lg-5">新增线路</a></li>
                    </ul>
                </div>
            </li>
            <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#weight" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>重量分段</span></a>
                <div id="weight" class="collapse">
                    <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                        <li class="sidebar-list-item"><a href="{{ url('admin/weight') }}" class="sidebar-link text-muted pl-lg-5">重量分段列表</a></li>
                        <li class="sidebar-list-item"><a href="{{ url('admin/weight/create') }}" class="sidebar-link text-muted pl-lg-5">新增重量分段</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
            @yield('content')
        </div>
    </div>
</div>

<!-- JavaScript files-->
<script src="{{ URL::asset('public/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('public/vendor/popper.js/umd/popper.min.js') }}"> </script>
<script src="{{ URL::asset('public/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('public/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
<script src="{{ URL::asset('public/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ URL::asset('public/js/js.cookie.min.js') }}"></script>
<script src="{{ URL::asset('public/js/charts-home.js') }}"></script>
<script src="{{ URL::asset('public/js/front.js') }}"></script>
<script>
    function showDeleteModal(id) {
        $("#deleteHaulId").val(id);// 将模态框中需要删除的大修的ID设为需要删除的ID
        $("#delcfmOverhaul").modal({
            backdrop: 'static',
            keyboard: false
        });
    }

    function showEditModal(id, type) {
        $("#deleteHaulId").val(id);// 将模态框中需要删除的大修的ID设为需要删除的ID
        window.location.href = "{{ url('admin/') }}" + '/' + type + '/' + id + '/edit';
    }
</script>
@yield('javaScript')
</body>
</html>