@extends('layouts.admin')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h6 class="text-uppercase mb-0">线路列表</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm card-text">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>线路名</th>
                        <th>添加时间</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lines as $key=>$line)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td><a href="{{ url("admin/line/{$line->id}/edit") }}">{{ $line->name }}</a> </td>
                            <td>{{ $line->created_at }}</td>
                            <td>{{ $line->updated_at }}</td>
                            <td>
                                <a href="javascript:void(0)" onclick="showEditModal({{ $line->id }}, 'line')">修改</a>
                                <a href="javascript:void(0)" onclick="showDeleteModal({{ $line->id }})">删除</a>
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
                    line_id = $("#deleteHaulId").val();
                    $.ajax({
                        url:'{{ url("admin/line/") }}' + '/' + line_id,
                        type:"post",
                        data:{'_method':"DELETE", 'id':line_id, '_token':'{{csrf_token()}}'},
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
