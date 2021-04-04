
--
-- 转存表中的数据 `admins`
--
INSERT INTO `admins` (`id`, `username`, `password`, `nickname`, `avatar`, `ip`, `login_time`, `last_login_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '$2y$10$TnUza7yGyIObzC2PSXWbWOaMr3EItm4Z8B.bSIAWeIyObYgJ7BgZe', '管理员', '', '127.0.0.1', '2021-03-25 03:06:10', '2021-03-24 05:06:32', '2020-08-09 10:43:46', '2021-03-25 03:06:10', NULL);

--
-- 转存表中的数据 `admin_role`
--
INSERT INTO `admin_role` (`id`, `admin_id`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 1, 4, NULL, NULL);

--
-- 转存表中的数据 `configs`
--

INSERT INTO `configs` (`id`, `name`, `val`, `content`) VALUES
(1, 'web_name', '青梧系统', '网站名'),
(2, 'title', '青梧系统', '网站标题'),
(3, 'keywords', '青梧系统,laravel,vue', '关键字'),
(4, 'description', '青梧系统开发平台', '网站描述'),
(5, 'logo', '', '网站Logo'),
(6, 'icon', '', '游览器Logo'),
(7, 'mobile', '', '联系电话'),
(8, 'email', 'bishashiwo@gmail.com', '邮箱'),
(9, 'icp', '123', '备案信息'),
(10, 'web_status', '1', '网站状态 0关 1开'),
(11, 'web_close_info', '网站维护中...', '网站关闭原因'),
(12, 'ali_pay', '{\"ali_h5\":{\"app_id\":null,\"public_key\":null,\"private_key\":null,\"return_url\":null,\"notify_url\":null},\"ali_app\":{\"app_id\":null,\"public_key\":null,\"private_key\":null,\"return_url\":null,\"notify_url\":null},\"ali_mini\":{\"app_id\":null,\"public_key\":null,\"private_key\":null,\"return_url\":null,\"notify_url\":null},\"ali_scan\":{\"app_id\":\"2016091900544672\",\"public_key\":null,\"private_key\":\"MIIEowIBAAKCAQEAqMfEF9QVEOW4+7dNJCY674IHjllPVFLUtP\\/r72qL37XpDlX\\/hutQQKOqRtaqBtoEiWEwnkvzvntUhbvNy6PDQfw5CGSIKfKV2UsIEnTXeoY9byizhkvmPedGSBEjo6622fwzdfu5uHRPbrwedNFcGKfb2PPgNeb3KUCJFYh5aHk\\/8WPpJBo\\/zJW29iN0WznqXiOWsuADCFNKQuzEvSzyxpiyZErJ2k+xptmX1S5MsfsENHVfLc\\/IY8VXQhle\\/UG+ccoTASUGyI8Dq2QV76XMDotaheOdX7iUOmtW6px\\/Rjk9qbzIfobbvlRDboJYnTiBXA+7Qh7Jr8ZMY2+L1ccHHQIDAQABAoIBADisS2YM6r3vxTuQgzCePa\\/qo4ri5kZUQeQ9AwYzaqBFvun3aoPtQ9dQnX6H2jPOxTM0FVUx\\/7h4RRtawnGcnZXskWIGD8q2ECcUkLNR1IDpznsi2ZVAqyEiJXFRf\\/wYUIHFs6nsSqJrO7jdJgTnv9rvkly5FxJCab\\/KUb2PQ+UWM76tGfhEjxv9+ONBuWxDHr6mHLQn2MK\\/CM\\/WB0qNDEMSVz4AqQ\\/hx0ysZZWBAZaOPN5V9FRV+bWhpo\\/O9HB18TaKNtRdAfMvsy2o70NLi\\/DZDjPsQ1dtIVTjBE5j\\/ikn6Qpm6P\\/tBCw\\/8hWukbO7Aktg+1YLakHq\\/110xnM4VmkCgYEA+VizDa7D1+1jzveS7Ca2\\/44dw3eGnYEz+DUxigeQO6nY2RIkUEhOg5MvdezJsN1P9GIGS3JG9QJCCmKPpWdHRnSTaz8H04sKeWlObOs\\/pgWyXq1g2WZWQZ77CUB7LcgChQTltPBPoUKeuW3Cj8GOG3xvEhgXoW5sGMhgOyMcVkcCgYEArUi25iUb3\\/F4QOd6Kkdlur825sXBJ2xGe6TQP8BhbE86\\/oUU34RuNz0PGwWnvidb5JwS9S4wCmkU+AbpC1+9cd1Mdpb08heY\\/KqYi9CxE0EGOYN3fWksbc4tuXD8BBKJPq2K1uPtzHEZKW2ysVsEfC52ZpZNC8MAVPbj\\/otcVXsCgYEA95ipa\\/vPgvm6M0lJvm+PJeLEEVX9+SbUKTMA9zQdd\\/FnX92Q65txQ1wDM9EmUhbhDyXLZF2csixE0bUfOLp+XyrhPAyBxAD8LKVx99v9\\/ukHPtZhJl9lZZHtazl5V3OVdOrxAiPinpndrPmdykwDxa1hSZFc3bMdadqHHBH4UH8CgYBbSfmBGX+r5OxzVP9ZErAXR\\/FGdlwhxrsDHHrReypYAw2TVM0ATCY8V6CDneEXHmkc8NRT8ndApMd1Oz6+zTtipzFHMJPujlv8kGs5DUKcYB9FYWsr2KKdXodcMJe0FYfUS1zfhMicceDNoIsJQGgGe\\/vIY9pHHf4oxMCsMwL7zQKBgGxePvJuaQRklq7m\\/IB4+htsOBR457HTXJnskpVfUBR5ZJGq8fq4ilO\\/Ej3F+Yi\\/AA6HrarM7xB5LV7e97HpHATJs6HcY+pMOdilEDPZ2CDBCR1CiJ9+pOUCyviIVDs7ePZFKqqnwf8HiJbQwTp6ADMWJp6WzRfriucaO9WW9S5I\",\"return_url\":\"http:\\/\\/app.qingwuit.com\\/api\\/payment\\/alipay\",\"notify_url\":\"http:\\/\\/app.qingwuit.com\\/api\\/payment\\/alipay\",\"ali_public_key\":\"MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA+z64yozEqXS9GvcT7e758dPTt8qJ2+12wcpioEhaBbfqvowcZjUV9BPL1EgtJie5SNK9rFDFO\\/POWVlzj8BVD0viUteNe2amPRhZLxzT3HXn9VJH+dTwOEgZ1MSrDisxOi7\\/NCTF42zQl6\\/w2lK2FQI\\/c1kIoN91ivWlPqX3BbXG54hyngu5T9j2AimEhKWMhq6sL2gVoNILbJDLDN85AOfoGb1DZ59dFSez\\/GtssO0KXGqfc1R1AggmisksQOKAXSiSHejEHvU\\/Zx4lIvpCWEwBXx7qWbOD2MXWmsrn6W41f4AJYoJxQ2QRUkFlKpstAgVfhNMR6A+W1p7bh647GQIDAQAB\"}}', '阿里云支付配置'),
(13, 'alioss', '{\"status\":false,\"access_id\":\"LTAI4F\",\"access_key\":\"i5Y8PA\",\"bucket\":\"qwshop\",\"endpoint\":\"oss-cn-qingdao.aliyuncs.com\",\"cdnDomain\":null,\"ssl\":false,\"isCName\":false}', '阿里云OSS'),
(14, 'alisms', '{\"key\":\"xxx\",\"secret\":\"xxx\"}', '阿里云sms'),
(15, 'amap_ak', '', '高德地图密钥'),
(16, 'wechat_public', '', '微信公众号配置'),
(17, 'wechat_pay', '{\"wechat_h5\":{\"app_id\":\"wx78ddf6a4699\",\"app_secret\":\"2f633e97835592\",\"mch_id\":\"1505332661\",\"key\":\"8ed99d4290fe86a\",\"notify_url\":\"http://xxx\"},\"wechat_public\":{\"app_id\":\"wx78ddf6a469\",\"app_secret\":\"2f633e978355\",\"mch_id\":\"15053326\",\"key\":\"8ed99d4290fe86ae\",\"notify_url\":\"http://i/payment\"},\"wechat_app\":{\"app_id\":null,\"app_secret\":null,\"mch_id\":null,\"key\":null,\"notify_url\":null},\"wechat_mini\":{\"app_id\":null,\"app_secret\":null,\"mch_id\":null,\"key\":null,\"notify_url\":null},\"wechat_scan\":{\"app_id\":null,\"app_secret\":null,\"mch_id\":null,\"key\":null,\"notify_url\":null}}', '微信支付配置'),
(18, 'oauth', '{\"weixinweb\":{\"client_id\":\"123\",\"client_secret\":\"142\",\"redirect\":\"124\"},\"weixin\":{\"client_id\":\"wx5b0a018866e\",\"client_secret\":\"43e8c03663af946a\",\"redirect\":\"http://pc.qingwuit.com\"}}', '第三方登陆配置'),
(19, 'task', '{\"confirm\":\"5\",\"cancel\":\"1\"}', '自动任务配置');

--
-- 转存表中的数据 `menus`
--
INSERT INTO `menus` (`id`, `pid`, `name`, `ename`, `icon`, `link`, `is_sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, '用户中心', '', 'iconchengyuan', '', 0, '2020-06-26 10:28:08', '2021-03-24 06:16:31', NULL),
(2, 1, '用户管理', '', '', '#', 0, '2020-06-26 10:28:08', '2020-06-26 10:28:08', NULL),
(3, 2, '管理员', '', '', '/Admin/admins', 1, '2020-06-26 10:28:08', '2020-06-27 10:02:31', NULL),
(4, 2, '平台用户', '', '', '/Admin/users', 0, '2020-06-26 10:28:08', '2020-09-10 06:21:11', NULL),
(5, 1, '菜单管理', '', '', '/Admin/menus', 0, '2020-06-26 10:28:08', '2021-03-24 05:16:39', NULL),
(8, 1, '接口管理', '', '', '', 0, '2020-06-26 10:34:44', '2020-06-26 10:34:44', NULL),
(9, 8, '接口列表', '', '', '/Admin/permissions', 0, '2020-06-26 10:35:03', '2020-06-26 10:35:03', NULL),
(10, 8, '接口分组', '', '', '/Admin/permission_groups', 0, '2020-06-26 10:35:20', '2020-06-26 10:35:20', NULL),
(11, 1, '角色管理', '', '', '/Admin/roles', 0, '2020-06-26 10:36:10', '2020-06-26 10:36:10', NULL),
(12, 0, '配置中心', '', 'iconshezhi', '', 1, '2021-03-24 05:28:25', '2021-03-24 06:01:44', NULL),
(14, 12, '网站配置', '', '', '/Admin/configs/web', 0, '2021-03-24 05:45:20', '2021-03-24 05:45:20', NULL),
(15, 12, '上传配置', '', '', '/Admin/configs/upload', 7, '2020-06-30 07:49:57', '2020-11-11 02:13:04', NULL),
(16, 12, '短信配置', '', '', '/Admin/configs/sms', 9, '2020-06-30 07:50:25', '2020-11-11 02:12:41', NULL),
(17, 12, 'Oauth配置', '', '', '/Admin/configs/oauth', 5, '2020-06-30 07:50:55', '2020-11-11 07:07:47', NULL),
(18, 12, '任务执行', '', '', '/Admin/configs/task', 11, '2020-06-30 07:55:42', '2020-11-11 02:12:57', NULL),
(19, 0, '文章中心', '', 'iconshuxie', '', 7, '2021-03-24 06:10:17', '2021-03-24 06:10:23', NULL),
(20, 19, '站点协议', '', '', '/Admin/agreements', 0, '2021-03-24 06:11:16', '2021-03-24 06:11:16', NULL),
(21, 19, '帮助中心', '', '', '/Admin/articles', 0, '2021-03-24 06:11:36', '2021-03-24 06:11:36', NULL);

--
-- 转存表中的数据 `permission_groups`
--
INSERT INTO `permission_groups` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '后台管理员', '2020-11-17 09:25:18', '2020-11-17 09:25:18', NULL),
(2, '平台用户', '2020-11-17 09:25:18', '2020-11-17 09:25:18', NULL),
(3, '角色管理', '2020-11-17 09:25:18', '2020-11-17 09:25:18', NULL),
(4, '菜单管理', '2020-11-17 09:25:18', '2020-11-17 09:25:18', NULL),
(5, '接口管理', '2020-11-17 09:25:18', '2020-11-17 09:25:18', NULL),
(6, '接口分组', '2020-11-17 09:25:18', '2020-11-17 09:25:18', NULL),
(7, '配置管理', '2020-11-17 09:25:18', '2020-11-17 09:25:18', NULL),
(8, '协议管理', '2020-11-17 09:25:18', '2020-11-17 09:25:18', NULL),
(9, '文章管理', '2020-11-17 09:25:18', '2020-11-17 09:25:18', NULL),
(11, '短信日志', '2020-11-17 09:25:18', '2020-11-17 09:25:18', NULL),
(12, '短信签名', '2020-11-17 09:25:18', '2020-11-17 09:25:18', NULL),
(13, '广告位管理', '2020-11-17 09:25:18', '2020-11-17 09:25:18', NULL),
(14, '广告管理', '2020-11-17 09:25:18', '2020-11-17 09:25:18', NULL),
(15, '公共接口', '2020-11-17 09:32:08', '2020-11-17 09:32:12', NULL);


--
-- 转存表中的数据 `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '超级管理员', '2021-03-26 03:40:11', '2021-03-26 03:40:11', NULL);


--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `pay_password`, `nickname`, `sex`, `avatar`, `phone`, `email`, `money`, `frozen_money`, `integral`, `inviter_id`, `ip`, `login_time`, `last_login_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '18888888888_285', '$2y$10$MLXAAhen63MokBUi2/0/0Ocv6/w8icO3Ch/59zWhXMqJ9PeoerFJa', '$2y$10$x9RUVPFAIIzuml9Wg8CCDeRCRzroibYqPSZALHobS9S9guLFxnttG', '18888888888_285', 1, '', '18888888888', '', '9999.00', '0.00', '0.00', 0, '127.0.0.1', '2021-03-24 04:51:44', '2021-03-24 04:51:44', '2021-03-25 03:10:12', '2021-03-25 04:25:22', NULL);
