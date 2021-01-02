<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PieChartStatus extends Controller
{
    function index()
    {
        $data = DB::table('asset')
            ->select(
                DB::raw('status as status'),
                DB::raw('count(*) as number'))
                ->groupBy('status')
                ->get();
            $array[] = ['Status' , 'Number'];
            foreach($data as $key => $value)
            {
                $array[++$key] = [$value->status, $value->number];
            }
            return view('admin.md.asset.index')->with('status', json_decode(
                $array
            ));
    }
}
