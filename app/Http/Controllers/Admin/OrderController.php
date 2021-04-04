<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\OrderResource\OrderCollection;
use App\Http\Resources\Admin\OrderResource\OrderResource;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderService $order_service)
    {
        $rs = $order_service->getOrders('admin');
        return $rs['status']?$this->success(new OrderCollection($rs['data'])):$this->error($rs['msg']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(OrderService $order_service, $id)
    {
        $rs = $order_service->getOrderInfoById($id,'admin');
        return $rs['status']?$this->success(new OrderResource($rs['data'])):$this->error($rs['msg']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Order $order_model, $id)
    {
        $order_model = $order_model->where(['id'=>$id])->first();
        $order_model->delivery_code = $request->delivery_code??'yd';
        $order_model->delivery_no = $request->delivery_no??'123456';

        // 判断是否需要修改订单状态
        if($order_model->order_status==2){
            $order_model->order_status = 3;
            $order_model->delivery_time = now();
        }
        $order_model->save();
        return $this->success([],__('base.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order_model, $id)
    {
        $idArray = array_filter(explode(',',$id),function($item){
            return is_numeric($item);
        });
        $order_model->destroy($idArray);
        return $this->success(__('base.success'));
    }
}
