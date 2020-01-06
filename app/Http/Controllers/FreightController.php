<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FreightController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        # 设置验证
        $request->validate([
            'addr' => 'bail|required',
            'type' => 'required',
            'weight' => 'required',
            'length' => 'required',
            'width' => 'required',
            'height' => 'required',
        ]);
        # 计算使用公斤 还是 体积
        $vol = $request->length * $request->width * $request->height;
        $vol = ($vol > $request->weight) ? $vol: $request->weight;

        $prices = DB::table('prices')
            ->leftJoin('nations', 'prices.nation_id', '=', 'nations.id')
            ->leftJoin('weights', 'prices.weight_id', '=', 'weights.id')
            ->leftJoin('lines', 'prices.line_id', '=', 'lines.id')
            ->where('nations.name', '=', $request->addr)
            ->where('weights.min', '<=', $vol)
            ->where('weights.max', '>', $vol)
            ->select('prices.id', 'nations.name as nation_name', 'nations.code as nation_code', 'weights.min', 'weights.max', 'lines.name as line_name', 'prices.price')
            ->get();

        foreach ($prices as $price)
        {
            $price->weight = $vol;
            $price->price_all = $vol * $price->price;
        }

        $data = [
            'prices' => $prices,
            'type' => $request->type,
        ];
        return view('result', ['data' => $data]);
    }
}
