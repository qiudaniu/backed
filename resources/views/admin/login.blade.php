<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/my-login.css') }}">
</head>
<body class="my-login-page">
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="brand">
                    <img src="{{ URL::asset('img/logo.jpg') }}">
                </div>
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">Login</h4>
                        <form method="POST" action="{{url('/admin/login')}}">

                            @csrf

                            <div class="form-group">
                                <label for="account">account</label>

                                <input id="account" type="text" class="form-control" name="account" value="" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>

                                <input id="password" type="password" class="form-control" name="password" required data-eye>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="remember" value="1"> Remember Me
                                </label>
                            </div>

                            <div class="form-group no-margin">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="footer">
                    Copyright &copy; Your Company 2017 - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/my-login.js') }}"></script>
</body>
</html>