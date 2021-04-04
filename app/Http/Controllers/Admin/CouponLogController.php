<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CouponResource\CouponLogCollection;
use App\Models\CouponLog;
use Illuminate\Http\Request;

class CouponLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,CouponLog $coupon_log_model)
    {
        $list = $coupon_log_model->with('user')->orderBy('id','desc')->paginate($request->per_page??30);
        return $this->success(new CouponLogCollection($list));
    }
}
