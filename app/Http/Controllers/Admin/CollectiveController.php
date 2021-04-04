<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CollectiveResource\CollectiveCollection;
use App\Http\Resources\Admin\CollectiveResource\CollectiveGoodsCollection;
use App\Http\Resources\Admin\CollectiveResource\CollectiveResource;
use App\Models\Collective;
use App\Models\Goods;
use Illuminate\Http\Request;

class CollectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Collective $collective_model)
    {
        $list = $collective_model->with(['goods'=>function($q){
            $q->select('id','goods_name','goods_master_image');
        }])->orderBy('id','desc')->paginate(request()->per_page??30);
        return $this->format(new CollectiveCollection($list));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Collective $collective_model)
    {
        $collective_model->goods_id = intval($request->goods_id);
        $collective_model->discount = floatval($request->discount);
        $collective_model->need = intval(abs($request->need));

        $collective_model->save();
        return $this->success([],__('base.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Collective $collective_model,$id)
    {
        $info = $collective_model->find($id);
        return $this->success(new CollectiveResource($info));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collective $collective_model,$id)
    {
        $collective_model = $collective_model->find($id);
        $collective_model->goods_id = intval($request->goods_id);
        $collective_model->discount = floatval($request->discount);
        $collective_model->need = intval(abs($request->need));
        $collective_model->save();
        return $this->success([],__('base.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collective $collective_model,$id)
    {
        $idArray = array_filter(explode(',',$id),function($item){
            return is_numeric($item);
        });
        $collective_model->whereIn('id',$idArray)->delete();
        return $this->success([],__('base.success'));
    }

    // 获取分销商品
    public function get_collective_goods(){
        $goods_model = new Goods();

        if(isset(request()->goods_name) && !empty(request()->goods_name)){
            $goods_model = $goods_model->where('goods_name','like','%'.request()->goods_name.'%');
        }

        $list = $goods_model->with(['collective'=>function($q){
            $q->select('goods_id');
        }])->paginate(request()->per_page??30);
        
        return $this->success(new CollectiveGoodsCollection($list));
    }
}
