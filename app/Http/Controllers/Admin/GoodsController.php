<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Http\Resources\Admin\GoodsResource\GoodsTabAdminCollection;
use App\Models\Freight;
use App\Models\GoodsSku;
use App\Services\GoodsService;
use App\Services\UploadService;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Goods $goods_model)
    {
        // 条件筛选
        $goods_params = [];
        if(!empty($request->goods_name)){
            $goods_model = $goods_model->where('goods_name','like','%'.$request->goods_name.'%');
        }
        if(!empty($request->brand_id)){
            $goods_model = $goods_model->where('brand_id',$request->brand_id);
        }
        if(!empty($request->class_id)){
            $goods_model = $goods_model->where('class_id',$request->class_id);
        }
        if(!empty($request->goods_no)){
            $goods_model = $goods_model->where('goods_no',$request->goods_no);
        }
        if(isset($request->goods_status)){
            $goods_params['goods_status'] = $request->goods_status;
        }
        
        $list = $goods_model->where($goods_params)
                            ->with(['goods_class','goods_brand','goods_skus'=>function($q){
                                return $q->select('goods_id','goods_price','goods_stock')->orderBy('goods_price','asc');
                            }])
                            ->orderBy('id','desc')
                            ->paginate($request->per_page??30);
        return $this->success(new GoodsTabAdminCollection($list));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,GoodsService $goods_service)
    {
        $info = $goods_service->add();
        if($info['status']){
            return $this->success([],__('goods.add_success'));
        }
        return $this->error(__('goods.add_error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GoodsService $goods_service,Freight $freight_model,$id)
    {
        $info = $goods_service->getGoodsInfo($id,'admin');
        if($info['status']){

            // 获取快递运费模版详情 // 可以不要没什么用
            // $freight_info = [];
            // if($info['data']['freight_id'] == 0){
            //     $freight_info = $freight_model->where('store_id',$info['data']['store_id'])->where('is_type',0)->first();
            // }else{
            //     $freight_info = $freight_model->where('store_id',$info['data']['store_id'])->where('is_type',1)->where('id',$info['data']['freight_id'])->first();
            // }
            // $info['data']['freight_info'] = $freight_info;
            return $this->success($info['data']);
        }
        return $this->error(__('goods.add_error'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,GoodsService $goods_service, $id)
    {
        $info = $goods_service->edit($id);
        if($info['status']){
            return $this->success([],__('goods.add_success'));
        }
        return $this->error(__('goods.add_error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goods $goods_model,GoodsSku $goods_sku_model,$id)
    {
        $idArray = array_filter(explode(',',$id),function($item){
            return is_numeric($item);
        });
  
        $goods_model->whereIn('id',$idArray)->delete();
        $goods_sku_model->whereIn('goods_id',$idArray)->delete();
        return $this->success([],__('base.success'));
    }


    // 商品图片上传
    public function goods_upload(){
        $upload_service = new UploadService();
        $rs = $upload_service->goods();
        if($rs['status']){
            return $this->success($rs['data'],$rs['msg']);
        }else{
            return $this->error($rs['msg']);
        }
    }
}