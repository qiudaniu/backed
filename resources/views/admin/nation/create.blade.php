@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 mb-5">
        <div class="card">
            <div class="card-header">
                <h3 class="h6 text-uppercase mb-0">新增记录</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="{{ route('nation.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-2 form-control-label"><span style="font-size: 20px">国家</span></label>
                        <div class="col-md-9">
                            <input id="name" type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="code" class="col-md-2 form-control-label"><span style="font-size: 20px">国家代码</span></label>
                        <div class="col-md-9">
                            <input id="code" type="text" name="code" class="form-control">
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