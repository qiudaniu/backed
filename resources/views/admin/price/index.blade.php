@extends('layouts.admin')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h6 class="text-uppercase mb-0">单价列表</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm card-text">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>国家</th>
                        <th>线路</th>
                        <th>公斤段</th>
                        <th>单价</th>
                        <th>添加时间</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($prices as $key=>$price)
                        <tr>
                            <th scope="row"><a href="{{ url("admin/price/{$price->id}/edit") }}">{{ $key+1 }}</a></th>
                            <td>{{ $price->nation_name }}</td>
                            <td>{{ $price->line_name }}</td>
                            <td>@if($price->left_section == 2)[
                                    @else （
                                    @endif
                                {{ $price->min }}~{{ $price->max }}
                                @if($price->right_section == 2)]
                                    @else ）
                                    @endif
                            </td>
                            <td>{{ $price->price }}</td>
                            <td>{{ $price->created_at }}</td>
                            <td>{{ $price->updated_at }}</td>
                            <td>
                                <a href="javascript:void(0)" onclick="showEditModal({{ $price->id }}, 'price')">修改</a>
                                <a href="javascript:void(0)" onclick="showDeleteModal({{ $price->id }})">删除</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

        </div>
    </div>
@endsection

@section('javaScript')
            <script>

                $("#deleteHaulBtn").click(function() {
                    price_id = $("#deleteHaulId").val();
                    $.ajax({
                        url:'{{ url("admin/price/") }}' + '/' + price_id,
                        type:"post",
                        data:{'_method':"DELETE", 'id':price_id, '_token':'{{csrf_token()}}'},
                        dataType:"json",
                        success:function(e){
                            if(e.code == 200){
                                window.location.reload()
                            }
                        },
                        fail:function(e){
                            if (e.code == 201){
                                alert(e.message)
                            }
                        }
                    });
                });

            </script>
    @endsection
