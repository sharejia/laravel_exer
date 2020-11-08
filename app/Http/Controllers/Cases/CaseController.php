<?php

namespace App\Http\Controllers\Cases;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CaseController extends Controller
{

    /**
     * 工单列表
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function lists()
    {
        $res = DB::table('mm_case')->select([
            'id',
            'description as desc',
            'machine_brand as brand',
            'machine_model as model',
            'c_time as date',
            'auid as name',
            'contact_address as address',
        ])->paginate(\Illuminate\Support\Facades\Request::post('pageSize',10));

        return response([
            'code' => 200,
            'msg'  => '请求成功',
            'data' => $res
        ]);
    }


}
