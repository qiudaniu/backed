@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 mb-5">
        <div class="card">
            <div class="card-header">
                <h3 class="h6 text-uppercase mb-0">All form elements</h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-md-2 form-control-label"><span style="font-size: 20px">国家</span></label>
                    <div class="col-md-9">
                        <input id="name" type="text" name="name" class="form-control" value="{{ $nation->name }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="code" class="col-md-2 form-control-label"><span style="font-size: 20px">国家代码</span></label>
                    <div class="col-md-9">
                        <input id="code" type="text" name="code" class="form-control" value="{{ $nation->code }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-9 ml-auto">
                        <button type="button" class="btn btn-primary"><a href="{{ url("admin/nation/{$nation->id}/edit") }}"><span style="background-color: white">修改</span></a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection