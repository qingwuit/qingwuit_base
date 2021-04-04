export default [
    // 登录
    {path: '/',name: 'admin_login',component: () => import('@/views/Admin/login')},

    // 后台界面
    {path:"/Admin/index",name:"admin_index",component:()=>import("@/views/Admin/index"),children:[

        {path:"/Admin/index",name:"admin_default",component:()=>import("@/views/Admin/default")}, // 打开默认页面

        // 用户管理
        {path:"/Admin/users",name:"admin_users",component:()=>import("@/views/Admin/users/index")}, 
        {path:"/Admin/users/form/:id?",name:"admin_users_form",component:()=>import("@/views/Admin/users/form")},

        // 后台管理员
        {path:"/Admin/admins",name:"admin_admins",component:()=>import("@/views/Admin/admins/index")}, 
        {path:"/Admin/admins/form/:id?",name:"admin_admins_form",component:()=>import("@/views/Admin/admins/form")},

        // 菜单管理
        {path:"/Admin/menus",name:"admin_menus",component:()=>import("@/views/Admin/menus/index")}, 
        {path:"/Admin/menus/form/:id?",name:"admin_menus_form",component:()=>import("@/views/Admin/menus/form")}, 

        // 接口分组
        {path:"/Admin/permission_groups",name:"admin_permission_groups",component:()=>import("@/views/Admin/permission_groups/index")}, 
        {path:"/Admin/permission_groups/form/:id?",name:"admin_permission_groups_form",component:()=>import("@/views/Admin/permission_groups/form")}, 
    
        // 接口管理
        {path:"/Admin/permissions",name:"admin_permissions",component:()=>import("@/views/Admin/permissions/index")}, 
        {path:"/Admin/permissions/form/:id?",name:"admin_permissions_form",component:()=>import("@/views/Admin/permissions/form")},
        
        // 角色管理
        {path:"/Admin/roles",name:"admin_roles",component:()=>import("@/views/Admin/roles/index")}, 
        {path:"/Admin/roles/form/:id?",name:"admin_roles_form",component:()=>import("@/views/Admin/roles/form")},

        // 配置中心
        {path:"/Admin/configs/web",name:"admin_configs_web",component:()=>import("@/views/Admin/configs/web/index")}, // 网站配置
        {path:"/Admin/configs/pay",name:"admin_configs_pay",component:()=>import("@/views/Admin/configs/pay/index")}, // 支付配置
        {path:"/Admin/configs/upload",name:"admin_configs_upload",component:()=>import("@/views/Admin/configs/oss/alioss")}, // 上传配置
        {path:"/Admin/configs/sms",name:"admin_configs_sms",component:()=>import("@/views/Admin/configs/sms/index")}, // 短信配置
        {path:"/Admin/sms_logs/index",name:"admin_sms_logs_index",component:()=>import("@/views/Admin/configs/sms/sms_log")}, // 短信日志
        {path:"/Admin/sms_signs/index",name:"admin_sms_signs_index",component:()=>import("@/views/Admin/configs/sms/sign/index")}, // 短信签名列表
        {path:"/Admin/sms_signs/form/:id?",name:"admin_sms_signs_form",component:()=>import("@/views/Admin/configs/sms/sign/form")}, // 短信签名编辑
        {path:"/Admin/configs/task",name:"admin_configs_task",component:()=>import("@/views/Admin/configs/task/index")}, // 自动任务配置
        {path:"/Admin/configs/oauth",name:"admin_configs_oauth",component:()=>import("@/views/Admin/configs/oauth/index")}, // OAuth 第三方登录

        // 站点协议
        {path:"/Admin/agreements",name:"admin_agreements_index",component:()=>import("@/views/Admin/agreements/index")}, // 站点协议列表
        {path:"/Admin/agreements/form/:id?",name:"admin_agreements_form",component:()=>import("@/views/Admin/agreements/form")}, // 站点协议编辑

        // 文章 帮助中心
        {path:"/Admin/articles",name:"admin_articles_index",component:()=>import("@/views/Admin/articles/index")}, // 帮助中心列表
        {path:"/Admin/articles/form/:id?",name:"admin_articles_form",component:()=>import("@/views/Admin/articles/form")}, // 帮助中心编辑
        
        // 广告位管理
        {path:"/Admin/adv_positions",name:"admin_adv_positions",component:()=>import("@/views/Admin/adv_positions/index")}, 
        {path:"/Admin/adv_positions/form/:id?",name:"admin_adv_positions_form",component:()=>import("@/views/Admin/adv_positions/form")},

        // 广告管理
        {path:"/Admin/advs",name:"admin_advs",component:()=>import("@/views/Admin/advs/index")}, 
        {path:"/Admin/advs/form/:id?",name:"admin_advs_form",component:()=>import("@/views/Admin/advs/form")},

    ]},
];