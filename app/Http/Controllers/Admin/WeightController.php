<?php

namespace App\Http\Controllers\Admin;

use App\Weight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weights = Weight::all();
        return view('admin.weight.index', ['weights' => $weights]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.weight.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => '请输入完整',
            'numeric' => '必须是数字类型',
        ];
        $request->validate([
            'min' => 'bail|required|numeric',
            'max' => 'required|numeric',
            'left_section' => 'required|numeric',
            'right_section' => 'required|numeric',
        ], $message);
        # 保存`重量`记录
        $weight = new Weight();
        $weight->min = $request->min;
        $weight->max = $request->max;
        $weight->left_section = $request->left_section;
        $weight->right_section = $request->right_section;
        $return = $weight->save();
        if ($return){
            return redirect('admin/weight')->with('message', '保存成功');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $weight = Weight::findOrFail($id);
        return view('admin.weight.edit', ['weight' => $weight]);
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
        $weight = Weight::find($id);
        if ($request->min) $weight->min = $request->min;
        if ($request->max) $weight->max = $request->max;
        if ($request->left_section) $weight->left_section = $request->left_section;
        if ($request->right_section) $weight->right_section = $request->right_section;
        $return = $weight->save();
        if ($return){
            return redirect('admin/weight');
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
        $id = Weight::destroy($id);
        if ($id){
            return json_encode(['code'=>200, 'message'=>'删除成功']);
        }else{
            return json_encode(['code'=>201, 'message'=>'删除失败']);
        }
    }
}
