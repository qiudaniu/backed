<?php

namespace App\Http\Controllers\Admin;

use App\Line;
use App\Nation;
use App\Prices;
use App\Weight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = DB::table('prices')
            ->leftJoin('nations', 'prices.nation_id', '=', 'nations.id')
            ->leftJoin('lines', 'prices.line_id', '=', 'lines.id')
            ->leftJoin('weights', 'prices.weight_id', '=', 'weights.id')
            ->select('prices.id', 'nations.name as nation_name', 'lines.name as line_name', 'weights.min', 'weights.max', 'weights.left_section', 'weights.right_section', 'prices.price', 'prices.created_at', 'prices.updated_at')
            ->get();
        return view('admin.price.index', ['prices' => $prices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nations = Nation::all();
        $lines = Line::all();
        $weights = DB::table('weights')->orderBy('min')->get();
        return view('admin.price.create', [
            'nations' => $nations,
            'lines' => $lines,
            'weights' => $weights,
        ]);
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
            'nation_id' => 'bail|required',
            'line_id' => 'required',
            'weight_id' => 'required',
            'price' => 'required',
        ]);
        #保存`线路`记录
        $price = new Prices();
        $price->nation_id = $request->nation_id;
        $price->line_id = $request->line_id;
        $price->weight_id = $request->weight_id;
        $price->price = $request->price;
        $return = $price->save();
        if ($return){
            return redirect('admin/price')->with('message', '保存成功');
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
        $price = DB::table('prices')
            ->leftJoin('nations', 'prices.nation_id', '=', 'nations.id')
            ->leftJoin('lines', 'prices.line_id', '=', 'lines.id')
            ->leftJoin('weights', 'prices.weight_id', '=', 'weights.id')
            ->select('prices.id', 'nations.name as nation_name', 'lines.name as line_name', 'weights.min', 'weights.max', 'weights.left_section', 'weights.right_section', 'prices.price', 'prices.created_at', 'prices.updated_at')
            ->where('prices.id', '=', $id)
            ->get();
        $nations = Nation::all();
        $lines = Line::all();
        $weights = Weight::all();
//        dd($price);
        return view('admin.price.edit', [
            'nations' => $nations,
            'lines' => $lines,
            'weights' => $weights,
            'price' => $price
        ]);
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
        $price = Prices::find($id);
        if ($request->nation_id) $price->nation_id = $request->nation_id;
        if ($request->line_id) $price->line_id = $request->line_id;
        if ($request->weight_id) $price->weight_id = $request->weight_id;
        if ($request->price) $price->price = $request->price;
        $return = $price->save();
        if ($return){
            return redirect('admin/price');
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
        $id = Prices::destroy($id);
        if ($id){
            return json_encode(['code'=>200, 'message'=>'删除成功']);
        }else{
            return json_encode(['code'=>201, 'message'=>'删除失败']);
        }
    }
}
