@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 mb-5">
        <div class="card">
            <div class="card-header">
                <h3 class="h6 text-uppercase mb-0">新增记录</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="{{ route('price.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">国家</label>
                        <div class="col-md-9 select mb-3">
                            <select name="nation_id" class="form-control">
                                @foreach($nations as $nation)
                                    <option value="{{ $nation->id }}">{{ $nation->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">线路</label>
                        <div class="col-md-9 select mb-3">
                            <select name="line_id" class="form-control">
                                @foreach($lines as $line)
                                    <option value="{{ $line->id }}">{{ $line->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">公斤段</label>
                        <div class="col-md-9 select mb-3">
                            <select name="weight_id" class="form-control">
                                @foreach($weights as $weight)
                                    <option value="{{ $weight->id }}">
                                        @if($weight->left_section == 2)[
                                        @else （
                                        @endif
                                        {{ $weight->min }}~{{ $weight->max }}
                                        @if($weight->right_section == 2)]
                                        @else ）
                                        @endif
                                    </option>
                                @endforeach</select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-md-2 form-control-label"><span style="font-size: 20px">单价</span></label>
                        <div class="col-md-9">
                            <input id="price" type="text" name="price" class="form-control">
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