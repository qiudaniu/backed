<?php

namespace App\Http\Controllers\Admin;

use App\Line;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lines = Line::all();
        return view('admin.line.index', ['lines' => $lines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.line.create');
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
            'name' => 'required',
        ]);
        #保存`线路`记录
        $line = new Line();
        $line->name = $request->name;
        $return = $line->save();
        if ($return){
            return redirect('admin/line')->with('message', '保存成功');
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
        $line = Line::findOrFail($id);
        return view('admin.line.edit', ['line' => $line]);
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
        $line = Line::find($id);
        if ($request->name) $line->name = $request->name;
        $return = $line->save();
        if ($return){
            return redirect('admin/line');
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
        $id = Line::destroy($id);
        if ($id){
            return json_encode(['code'=>200, 'message'=>'删除成功']);
        }else{
            return json_encode(['code'=>201, 'message'=>'删除失败']);
        }
    }
}
