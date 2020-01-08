@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 mb-5">
        <div class="card">
            <div class="card-header">
                <h3 class="h6 text-uppercase mb-0">新增记录</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="{{ route('weight.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="min" class="col-md-2 form-control-label"><span style="font-size: 20px">重量小值</span></label>
                        <div class="col-md-9">
                            <input id="min" type="text" name="min" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="max" class="col-md-2 form-control-label"><span style="font-size: 20px">重量大值</span></label>
                        <div class="col-md-9">
                            <input id="max" type="text" name="max" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="left" class="col-md-2 form-control-label"><span style="font-size: 20px">左区间</span></label>
                        <div class="col-md-9">
                            <input id="left" type="text" name="left" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="right" class="col-md-2 form-control-label"><span style="font-size: 20px">右区间</span></label>
                        <div class="col-md-9">
                            <input id="right" type="text" name="right" class="form-control">
                        </div>
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
                    @if(Session::has('message'))
                        <div class="alert alert-info"> {{Session::get('message')}}
                        </div>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-9 ml-auto">
                            <button type="reset" class="btn btn-secondary">取消</button>
                            <button type="submit" class="btn btn-primary">新增</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection