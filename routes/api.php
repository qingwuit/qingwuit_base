<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/**
 * 
 * @author hg <364825702@qq.com>
 * 商城总后台 路由
 * 
 */
Route::any('/test','Admin\LoginController@test'); // 测试接口

Route::namespace('Admin')->prefix('Admin')->group(function(){

    Route::post('/login','LoginController@login'); // 登陆
    Route::get('/logout','LoginController@logout'); // 退出账号
    Route::get('/check_login','LoginController@check_login'); // 检测登陆

    Route::group(['middleware'=>'jwt.admin'],function(){
        
        Route::apiResources([
            'admins'=>'AdminController', // 超级管理员
            'users'=>'UserController', // 平台用户
            'roles'=>'RoleController', // 用户角色
            'menus'=>'MenuController', // 用户菜单
            'permissions'=>'PermissionController', // 角色权限
            'permission_groups'=>'PermissionGroupController', // 接口权限分组
        ]); 

        // 菜单处理
        Route::get('/menus/cache/clear','MenuController@clear_cache')->name('menus.clear_cache'); // 缓存清除接口

        // 配置中心
        Route::apiResource('configs','ConfigController')->except(['update','show','destroy']);
        Route::post('/configs/upload/logo','ConfigController@config_logo')->name('configs.config_logo'); // 配置中心图上传(Logo)
        Route::post('/configs/upload/icon','ConfigController@config_icon')->name('configs.config_icon'); // 配置中心上传(icon)

        Route::apiResource('agreements','AgreementController'); // 站点协议 
        Route::apiResource('articles','ArticleController'); // 文章，帮助中心 

        // 编辑器上传图片接口
        Route::post('/editor/upload','EditorController@editor')->name('public.editor');  // 富文本编辑器图上传

        // 短信管理
        Route::apiResource('sms_logs','SmsLogController')->except(['update','show','store']); // 短信日志
        Route::apiResource('sms_signs','SmsSignController'); // 短信签名

    });

    
});





/**
 * 
 * @author hg <364825702@qq.com>
 * 商城支付回调|其他回调 路由
 * 
 */
Route::namespace('PayCallBack')->group(function(){

    Route::any('/payment/{name}','PaymentController@payment'); // 回调地址  [/api/payment/wechat] | [/api/payment/ali]
    Route::any('/oauth/{name}','OauthController@oauth'); // Oauth 第三方登录  [/api/oauth/wechat] | [/api/payment/github]
    Route::any('/oauth/callback/{name}','OauthController@oauthCallback'); // Oauth 第三方登录回调地址  [/api/oauth/wechat] | [/api/payment/github]
    
});