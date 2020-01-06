<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>运费查询</title>
    <link rel="stylesheet" href="{{ asset('public/css/freight.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('public/css/public.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/swiper.min.css') }}">

</head>
<body>
    <!--<div class="container">-->
    <h1 class="c_h1">运费查询</h1>
    <div class="c_d1">
        <form action="{{ url('freight') }}" method="post" class="c_f1">
            @csrf
            <label for="addr">1.请选择您的快件目的地</label>
            <input id="addr" name="addr" type="text" class="c_i1" placeholder="输入国家或二字编码，比如美国或US">
            <label for="btn3">2.请选择您的快件类型</label>
            <input id="btn3" name="type" type="text" class="c_i1" readonly="readonly" placeholder="请选择">
            <label for="weight">3.请输入您的快件重量，单位为千克(公斤)</label>
            <input id="weight" name="weight" type="text" class="c_i1" placeholder="快件的重量">
            <span>4.请输入您的快件重量，单位为厘米</span>
            <div>
                <input name="length" type="text" class="c_i2" placeholder="长">
                <input name="width" type="text" class="c_i2" placeholder="宽">
                <input name="height" type="text" class="c_i2" placeholder="高">
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="submit" value="点击查询" class="c_i3">
            <div class="select_box select_box3"></div>
        </form>
    </div>
    <!--</div>-->


    <script src="{{ asset('public/js/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('public/js/swiper.min.js') }}"></script>
    <script src="{{ asset('public/js/dyselect.js') }}"></script>
    <script src="{{ asset('public/js/index.js') }}"></script>

</body>
</html>
