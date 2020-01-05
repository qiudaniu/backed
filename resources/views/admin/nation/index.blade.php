@extends('layouts.admin')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h6 class="text-uppercase mb-0">国家列表</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm card-text">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>国家名</th>
                        <th>国家代码</th>
                        <th>添加时间</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nations as $key=>$nation)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td><a href="{{ url("admin/nation/{$nation->id}/edit") }}">{{ $nation->name }}</a> </td>
                            <td>{{ $nation->code }}</td>
                            <td>{{ $nation->created_at }}</td>
                            <td>{{ $nation->updated_at }}</td>
                            <td>
                                <a href="javascript:void(0)" onclick="showEditModal({{ $nation->id }}, 'nation')">修改</a>
                                <a href="javascript:void(0)" onclick="showDeleteModal({{ $nation->id }})">删除</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- 模态框   信息删除确认 -->
                <div class="modal fade" id="delcfmOverhaul">
                    <div class="modal-dialog">
                        <div class="modal-content message_align">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title">提示</h4>
                            </div>
                            <div class="modal-body">
                                <!-- 隐藏需要删除的id -->
                                <input type="hidden" id="deleteHaulId" />
                                <p>您确认要删除该条信息吗？</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default"
                                        data-dismiss="modal">取消</button>
                                <button type="button" class="btn btn-primary"
                                        id="deleteHaulBtn">确认</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->

                </div>
        </div>
    </div>
@endsection

@section('javaScript')
            <script>

                $("#deleteHaulBtn").click(function() {
                    nation_id = $("#deleteHaulId").val();
                    $.ajax({
                        url:'{{ url("admin/nation/") }}' + '/' + nation_id,
                        type:"post",
                        data:{'_method':"DELETE", 'id':nation_id, '_token':'{{csrf_token()}}'},
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
