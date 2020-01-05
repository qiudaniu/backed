<?php

namespace App\Http\Controllers\Admin;

use App\Nation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nations = Nation::all();
        # 列表页
        return view('admin.nation.index', ['nations' => $nations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # 新增`国家`记录 表单
        return view('admin.nation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required',
            'code' => 'required',
        ]);
        # 保存`国家`记录
        $nation = new Nation();
        $nation->name = $request->name;
        $nation->code = $request->code;
        $return = $nation->save();
        if ($return){
            return redirect('admin/nation')->with('message', '保存成功');
        }else{
            return back()->with('message', '保存失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nation = Nation::findOrFail($id);
        return view('admin.nation.show', ['nation' => $nation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nation = Nation::findOrFail($id);
        return view('admin.nation.edit', ['nation' => $nation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        # 更新数据
        $nation = Nation::find($id);
        if ($request->name) $nation->name = $request->name;
        if ($request->code) $nation->code = $request->code;
        $return = $nation->save();
        if ($return){
            return redirect('admin/nation');
        }else{
            return back()->with('message_change', '修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Nation::destroy($id);
        if ($id){
            return json_encode(['code'=>200, 'message'=>'删除成功']);
        }else{
            return json_encode(['code'=>201, 'message'=>'删除失败']);
        }
    }
}
