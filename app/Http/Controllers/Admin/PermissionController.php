<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req,Permission $permission_model)
    {
        
        if(!empty($req->name)){
            $permission_model = $permission_model->where('name','like','%'.$req->name.'%');
        }
        if(!empty($req->apis)){
            $permission_model = $permission_model->where('apis','like','%'.$req->apis.'%');
        }
        if(!empty($req->pid)){
            $permission_model = $permission_model->where('pid',$req->pid);
        }

        // 自动更新添加路由所有接口
        if(isset($req->batch)){
            $routeList = app()->routes->getRoutes();
            $routeListFormat = [];
            $routeApis = [];
            foreach($routeList as $v){
                if($v->action['prefix'] != 'api/Admin' || !isset($v->action['as'])){
                    continue;
                }
                $items = [];
                $items['as'] = $v->action['as'];
                $items['controller'] = $v->action['controller'];
                $items['uri'] = $v->uri;
                $asArr = explode('.',$items['as']);
                $InterfaceName = $asArr[0].'-未知';
                switch($asArr[1]){
                    case 'index':
                        $InterfaceName = $asArr[0].'-列表';
                        break;
                    case 'store':
                        $InterfaceName = $asArr[0].'-添加';
                        break;
                    case 'show':
                        $InterfaceName = $asArr[0].'-详情';
                        break;
                    case 'update':
                        $InterfaceName = $asArr[0].'-编辑';
                        break;
                    case 'destroy':
                        $InterfaceName = $asArr[0].'-删除';
                        break;
                }
                $items['Interface_name'] = $InterfaceName;
                $routeApis[] = $items['as'];
                $routeListFormat[] = $items;
            }

            // 查看是否存在该接口
            $permissionList = $permission_model->whereIn('apis',$routeApis)->get();
            if(!$permissionList->isEmpty()){
                foreach($permissionList as $v){
                    $searchRes = array_search($v->apis,$routeApis);
                    if($searchRes !== null){
                        unset($routeListFormat[$searchRes]);
                    }
                }
            }

            $routeListFormat = array_merge($routeListFormat,[]);
            return $this->success($routeListFormat);
        }

        $list = $permission_model->With('permission_group')->orderBy('id','desc')->paginate($req->per_page??30);
        return $this->success($list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Permission $permission_model)
    {

        if(isset($request->batch) && !empty($request->batch)){
            $permission_model->insert($request->batch);
            return $this->success([],__('base.success'));
        }
        
        // 正常编辑
        $permission_model->pid = $request->pid;
        $permission_model->name = $request->name;
        $permission_model->apis = $request->apis;
        $permission_model->content = $request->content??'';
        $permission_model->save();
        return $this->success([],__('base.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission_model,$id)
    {
        $info = $permission_model->find($id);
        return $this->success($info);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Permission $permission_model, $id)
    {
        $permission_model = $permission_model->find($id);
        $permission_model->pid = $request->pid;
        $permission_model->name = $request->name;
        $permission_model->apis = $request->apis;
        $permission_model->content = $request->content??'';
        $permission_model->save();
        return $this->success([],__('base.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission_model,$id)
    {
        $idArray = array_filter(explode(',',$id),function($item){
            return is_numeric($item);
        });
        $permission_model->destroy($idArray);
        return $this->success([],__('base.success'));
    }

}
