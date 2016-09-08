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
    'nav' => [
        ['name' => '面板', 'url' => 'dashboard','page'=>[
            ['name'=>'控制面板','url'=>'dashboard'],
            ['name'=>'修改密码','url'=>'passport/password'],
        ]],
        ['name' => '用户管理', 'url' => 'user','page'=>[
            ['name'=>'用户列表', 'url'=>'user'],
            ['name'=>'添加用户', 'url'=>'user/add']
        ]],
        ['name' => '项目管理', 'url' => 'task','page'=>[
            ['name'=>'公司管理', 'url'=>'corp'],
            ['name'=>'创建公司', 'url'=>'corp/create'],
            ['name'=>'项目管理', 'url'=>'task'],
            ['name'=>'创建项目', 'url'=>'task/create'],
        ]],
        ['name' => '文章管理', 'url' => 'news','page'=>[
            ['name'=>'文章管理', 'url'=>'news'],
            ['name'=>'发布文章', 'url'=>'news/create'],
        ]],
        ['name' => '数据统计', 'url' => 'census','page'=>[
            ['name'=>'数据统计', 'url'=>'census'],
        ]],
        ['name' => '系统管理', 'url' => 'system','page'=>[
            ['name'=>'系统管理', 'url'=>'system'],
            ['name'=>'角色管理', 'url'=>'system/role'],
        ]],
    ]
];