@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 mb-5">
        <div class="card">
            <div class="card-header">
                <h3 class="h6 text-uppercase mb-0">修改信息</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="{{ url("admin/weight/{$weight->id}") }}">
                    <input type="hidden" name="_method" value="put">
                    @csrf
                    <div class="form-group row">
                        <label for="min" class="col-md-2 form-control-label"><span style="font-size: 20px">重量小值</span></label>
                        <div class="col-md-9">
                            <input id="min" type="text" name="min" class="form-control" value="{{ $weight->min }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="max" class="col-md-2 form-control-label"><span style="font-size: 20px">重量大值</span></label>
                        <div class="col-md-9">
                            <input id="max" type="text" name="max" class="form-control" value="{{ $weight->max }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">左区间</label>
                        <div class="col-md-9 select mb-3">
                            <select name="left_section" class="form-control">
                                <option value="1" @if($weight->left_section == 1)selected
                                            @endif>开区间</option>
                                <option value="2" @if($weight->left_section == 2)selected
                                            @endif>闭区间</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">右区间</label>
                        <div class="col-md-9 select mb-3">
                            <select name="right_section" class="form-control">
                                <option value="1" @if($weight->right_section == 1)selected
                                        @endif>开区间</option>
                                <option value="2" @if($weight->right_section == 2)selected
                                        @endif>闭区间</option>
                            </select>
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