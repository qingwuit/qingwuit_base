<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CouponResource\CouponCollection;
use App\Http\Resources\Admin\CouponResource\CouponResource;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Coupon $coupon_model)
    {
        $list = $coupon_model->orderBy('id','desc')->paginate($request->per_page??30);
        return $this->success(new CouponCollection($list));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Coupon $coupon_model)
    {
        $coupon_model->name = $request->name??'coupon';
        $coupon_model->money = intval($request->money);
        $coupon_model->use_money = intval($request->use_money);
        $coupon_model->stock = intval(abs($request->stock));
        $coupon_model->content = $request->content??'';
        $coupon_model->start_time = empty($request->times)?now():$request->times[0];
        $coupon_model->end_time = empty($request->times)?now():$request->times[1];

        if($coupon_model->money>=$coupon_model->use_money){
            return $this->error(__('markets.coupon_money_error'));
        }

        $coupon_model->save();
        return $this->success([],__('base.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon_model,$id)
    {
        $info = $coupon_model->find($id);
        return $this->success(new CouponResource($info));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Coupon $coupon_model, $id)
    {
        $coupon_model = $coupon_model->find($id);
        $coupon_model->name = $request->name??'coupon';
        $coupon_model->money = intval($request->money);
        $coupon_model->use_money = intval($request->use_money);
        $coupon_model->stock = intval(abs($request->stock));
        $coupon_model->content = $request->content??'';
        $coupon_model->start_time = empty($request->times)?now():$request->times[0];
        $coupon_model->end_time = empty($request->times)?now():$request->times[1];

        if($coupon_model->money>=$coupon_model->use_money){
            return $this->error(__('markets.coupon_money_error'));
        }

        $coupon_model->save();
        return $this->success([],__('base.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon_model,$id)
    {
        $idArray = array_filter(explode(',',$id),function($item){
            return is_numeric($item);
        });
        $coupon_model->whereIn('id',$idArray)->delete();
        return $this->success([],__('base.success'));
    }
}
