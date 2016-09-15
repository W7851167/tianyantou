<?php
/*********************************************************************************
 *  资金管理控制器 - phpad
 *-------------------------------------------------------------------------------
 * 版权所有: CopyRight By tianyantou.com
 * 文件内容简单说明
 *-------------------------------------------------------------------------------
 * $FILE:WalletController.php
 * $Author:pzz
 * $Dtime:2016/9/13
 ***********************************************************************************/

namespace App\Http\Controllers\Account;


use App\Http\Controllers\FrontController;

class WalletController extends FrontController
{
    public function __construct()
    {
        parent::__initalize();
    }

    public function withdraw()
    {
        return view('account.wallet.withdraw');
    }

    public function book()
    {
        return view('account.wallet.book');
    }
}