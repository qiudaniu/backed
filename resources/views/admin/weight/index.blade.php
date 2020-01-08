@extends('layouts.admin')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h6 class="text-uppercase mb-0">重量分段列表</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm card-text">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>重量小值</th>
                        <th>重量大值</th>
                        <th>左区间</th>
                        <th>右区间</th>
                        <th>添加时间</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($weights as $key=>$weight)
                        <tr>
                            <th scope="row"><a href="{{ url("admin/weight/{$weight->id}/edit") }}">{{ $key+1 }}</a></th>
                            <td>{{ $weight->min }}</td>
                            <td>{{ $weight->max }}</td>
                            <td>
                                @if($weight->left_section  == 1) 开区间
                                    @else 闭区间
                                    @endif
                            </td>
                            <td>
                                @if($weight->right_section  == 1) 开区间
                                @else 闭区间
                                @endif
                            </td>
                            <td>{{ $weight->created_at }}</td>
                            <td>{{ $weight->updated_at }}</td>
                            <td>
                                <a href="javascript:void(0)" onclick="showEditModal({{ $weight->id }}, 'weight')">修改</a>
                                <a href="javascript:void(0)" onclick="showDeleteModal({{ $weight->id }})">删除</a>
                            </td>
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

                $("#deleteHaulBtn").click(function() {
                    weight_id = $("#deleteHaulId").val();
                    $.ajax({
                        url:'{{ url("admin/weight/") }}' + '/' + weight_id,
                        type:"post",
                        data:{'_method':"DELETE", 'id':weight_id, '_token':'{{csrf_token()}}'},
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
