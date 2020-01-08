<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FreightController extends Controller
{
    public function index()
    {
        return view('index', ['result'=>'']);
    }

    public function store(Request $request)
    {
        $message = [
            'addr.required' => '请输入国家',
            'weight.required' => '请输入快件重量',
            'length.required' => '请输入快件长度',
            'width.required' => '请输入快件宽度',
            'height.required' => '请输入快件高度',
        ];
        # 设置验证
        $request->validate([
            'addr' => 'bail|required',
            'type' => 'required',
            'weight' => 'required',
            'length' => 'required',
            'width' => 'required',
            'height' => 'required',
        ], $message);
        # 计算使用公斤 还是 体积
        /*$vol = $request->length * $request->width * $request->height;
        $vol = ($vol > $request->weight) ? $vol: $request->weight;*/
        $vol = $request->weight;

        # 数据库读出该国家的id 输入（国家|代码）
        $nation = DB::table('nations')->where('name', '=', $request->addr)
            ->orWhere('code', '=', $request->addr)
            ->get();
        # 数据库读出该公斤段的id
        $weight = DB::table('weights')
            ->whereRaw("min<=$vol and max>$vol and left=1 and right=0")
            ->orWhereRaw("min<$vol and max>$vol and left=0 and right=0")
            ->orWhereRaw("min<=$vol and max>=$vol and left=1 and right=1")
            ->orWhereRaw("min<$vol and max>=$vol and left=0 and right=1")
            ->get();

        if (!$nation->isEmpty() && !$weight->isEmpty()){
            $prices = DB::table('prices')
                ->leftJoin('nations', 'prices.nation_id', '=', 'nations.id')
                ->leftJoin('weights', 'prices.weight_id', '=', 'weights.id')
                ->leftJoin('lines', 'prices.line_id', '=', 'lines.id')
                ->where('nation_id', '=', $nation[0]->id)
                ->where('weight_id', '=', $weight[0]->id)
                ->select('prices.id', 'lines.name as line_name', 'prices.price')
                ->get();
        }else{
            return view('index', ['result'=>'查询无数据']);
        }

        foreach ($prices as $price)
        {
            $price->price_all = $vol * $price->price;
        }

        $data = [
            'prices' => $prices,
            'type' => $request->type,
            'weight' => $vol,
            'min' => $weight[0]->min,
            'max' => $weight[0]->max,
            'nation_name' => $nation[0]->name,
            'nation_code' => $nation[0]->code,
        ];
        return view('result', ['data' => $data]);
    }
}
