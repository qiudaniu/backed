@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h6 class="text-uppercase mb-0">结果<span style="color: green; float: right;">快件类型---{{ $data['type'] }}</span></h6>
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm card-text">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>国家</th>
                        <th>国家代码</th>
                        <th>重量区间</th>
                        <th>快件重量</th>
                        <th>线路</th>
                        <th>单价</th>
                        <th>总价</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['prices'] as $key=>$price)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $price->nation_name }}</td>
                            <td>{{ $price->nation_code }}</td>
                            <td>[{{ $price->min }},{{ $price->max }})</td>
                            <td>{{ $price->weight }}</td>
                            <td>{{ $price->line_name }}</td>
                            <td>{{ $price->price }}</td>
                            <td>{{ $price->price_all }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    @endsection