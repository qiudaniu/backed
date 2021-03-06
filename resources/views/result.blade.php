@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h6 class="text-uppercase mb-0"><span style="color: green;">快件类型---{{ $data['type'] }}</span><span style="color: #880000; float: right">结果</span></h6>
                <h6 class="text-uppercase mb-0"><span style="color: green;">国家---{{ $data['nation_name'] }} || 国家代码---{{ $data['nation_code'] }}</span></h6>
                <h6 class="text-uppercase mb-0"><span style="color: green;">重量区间---[ {{ $data['min'] }}, {{ $data['max'] }})</span></h6>
                <h6 class="text-uppercase mb-0"><span style="color: green;">包裹重量---{{ $data['weight'] }}</span></h6>
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm card-text">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>线路</th>
                        <th>单价</th>
                        <th>总价</th>
                        <th>注意事项</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['prices'] as $key=>$price)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $price->line_name }}</td>
                            <td>{{ $price->price }}</td>
                            <td>{{ $price->price_all }}</td>
                            <td><a href="javascript:void(0)" onclick="showRemark({{ $price->id }})"><img
                                            src="{{ URL::asset('public/img/note.png') }}"
                                            alt="注意事项" width="20" height="20" align="middle"></a></td>
                        </tr>
                        <tr id="remark_{{ $price->id }}" style="display: none; color: red;">
                            <td colspan="5">{{ $price->remark }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    @endsection

@section('javaScript')
    <script>
        function showRemark(id) {
            display_remark = $("#remark_" + id).css('display');
            if (display_remark === "none") {
                $("#remark_" + id).css('display', "");
            }else {
                $("#remark_" + id).css('display', "none");
            }
        }
    </script>
    @endsection