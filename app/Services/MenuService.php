<?php
namespace App\Services;
use App\Models\Menu;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Cache;

class MenuService extends BaseService{
    use HelperTrait;
    public function getMenus(){
        $menu_model = new Menu();
        $cache_name = 'admin_menus_cache';
        $list = [];
        if(!Cache::has($cache_name)){
            $menus_list = $menu_model->orderBy('is_sort')->get()->toArray();
            $list = $this->getChildren($menus_list);
            Cache::set($cache_name,$list);
        }else{
            $list = Cache::get($cache_name);
        }
        return $this->format($list);
    }

    // 清空缓存
    public function clearCache(){
        $rs = Cache::forget('admin_menus_cache');
        $rs = Cache::forget('seller_menus_cache');
        return $this->format($rs);
    }
}
