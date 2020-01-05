@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 mb-5">
        <div class="card">
            <div class="card-header">
                <h3 class="h6 text-uppercase mb-0">修改信息</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="{{ url("admin/nation/{$nation->id}") }}">
                    <input type="hidden" name="_method" value="put">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-2 form-control-label"><span style="font-size: 20px">国家</span></label>
                        <div class="col-md-9">
                            <input id="name" type="text" name="name" class="form-control" value="{{ $nation->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="code" class="col-md-2 form-control-label"><span style="font-size: 20px">国家代码</span></label>
                        <div class="col-md-9">
                            <input id="code" type="text" name="code" class="form-control" value="{{ $nation->code }}">
                        </div>
                    </div>
                    @if(Session::has('message_change'))
                        <div class="alert alert-info"> {{Session::get('message_change')}}
                        </div>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-9 ml-auto">
                            <button type="reset" class="btn btn-secondary">取消</button>
                            <button type="submit" class="btn btn-primary">修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection