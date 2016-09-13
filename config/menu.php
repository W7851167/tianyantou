<?php
/*********************************************************************************
 *  PhpStorm - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By cw100.com
 * 导航菜单
 *-------------------------------------------------------------------------------
 * $FILE:menu.php
 * $Author:zxs
 * $Dtime:2016/9/8
 ***********************************************************************************/

return [
    'menu' => [
        ['name' => '面板', 'url' => 'dashboard', 'tag' => 'home', 'child' => [
            ['name' => '控制面板', 'url' => 'dashboard', 'tag' => 'home.dashboard.index'],
            ['name' => '修改密码', 'url' => 'passport/password', 'tag' => 'home.passport.password'],
        ]],
        ['name' => '用户管理', 'url' => 'user', 'tag' => 'user', 'child' => [
            ['name' => '用户列表', 'url' => 'user', 'tag' => 'user.user.index'],
            ['name' => '提现管理', 'url' => 'withdraw', 'tag' => 'user.withdraw.index'],
        ]],
        ['name' => '项目管理', 'url' => 'task', 'tag' => 'task', 'child' => [
            ['name' => '公司管理', 'url' => 'corp', 'tag' => 'task.corp.index'],
            ['name' => '项目管理', 'url' => 'task', 'tag' => 'task.task.index'],
            ['name' => '任务管理', 'url' => 'achieve', 'tag' => 'task.achieve.index'],
        ]],
        ['name' => '文章管理', 'url' => 'news/multi', 'tag' => 'news', 'child' => [
            ['name' => '单分类文章', 'url' => 'news/single', 'tag' => 'news.single.index'],
            ['name' => '列表文章', 'url' => 'news/multi', 'tag' => 'news.multi.index'],
            ['name' => '帮助中心', 'url' => 'news/help', 'tag' => 'news.help.index'],
            ['name' => '公告/事件', 'url' => 'news/notice', 'tag' => 'news.notice.index'],
        ]],
        ['name' => '数据统计', 'url' => 'census', 'tag' => 'census', 'child' => [
            ['name' => '数据统计', 'url' => 'census', 'tag' => 'census.census.index'],
            ['name' => '首页轮播', 'url' => 'ad', 'tag' => 'census.ad.index'],
        ]],
        ['name' => '系统管理', 'url' => 'system', 'tag' => 'system', 'child' => [
            ['name' => '系统管理', 'url' => 'system', 'tag' => 'system.system.index'],
            ['name' => '角色管理', 'url' => 'system/role', 'tag' => 'system.role.index'],
        ]],
    ],
];