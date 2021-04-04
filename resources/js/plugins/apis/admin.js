import common from './common';
const baseUrl = common.baseUrl;
export default 
{
     /**
     * 后台接口
     * <www.qingwuit.com>
     */

    "adminLogin" : baseUrl + "Admin/login", // 登录
    "adminLogout" : baseUrl + "Admin/logout", // 登出
    "adminCheckLogin" : baseUrl + "Admin/check_login", // 验证是否登录

    'adminAdmins' : baseUrl + 'Admin/admins', // 后台管理员
    'adminUsers' : baseUrl + 'Admin/users', // 平台用户
    
    'adminRoles' : baseUrl + 'Admin/roles', // 角色管理
    'adminPermissionGroups' : baseUrl + 'Admin/permission_groups', // 后台接口分组
    'adminPermissions' : baseUrl + 'Admin/permissions', // 后台接口分组

    // 菜单处理
    'adminMenus' : baseUrl + 'Admin/menus', // 后台菜单
    'adminMenusClearCache' : baseUrl + 'Admin/menus/cache/clear', // 清空菜单缓存

    // 配置中心
    'adminConfigs' : baseUrl + 'Admin/configs', // 配置信息获取
    'adminConfigsUploadLogo' : baseUrl + 'Admin/configs/upload/logo', // Logo图上传
    'adminConfigsUploadIcon' : baseUrl + 'Admin/configs/upload/icon', // Icon图上传

    // 站点协议
    'adminAgreements' : baseUrl + 'Admin/agreements', 

    // 文章 帮助中心
    'adminArticles' : baseUrl + 'Admin/articles', 

    // 编辑器上传
    'adminEditor' : baseUrl + 'Admin/editor/upload',

    // 短信日志
    'adminSmsLogs' : baseUrl + 'Admin/sms_logs', // 短信日志
    'adminSmsSigns' : baseUrl + 'Admin/sms_signs', // 短信签名


    // 广告管理
    'adminAdvPositions' : baseUrl + 'Admin/adv_positions',  // 广告位
    'adminAdvs' : baseUrl + 'Admin/advs',  // 广告管理
    'adminAdvsUploadThumb' : baseUrl + 'Admin/advs/upload/thumb', // 品牌缩略图上传

};
