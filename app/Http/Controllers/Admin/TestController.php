<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/9/12
 * Time: 15:28
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Models\PastModel;

class TestController extends AdminController{

    public function  index() {
        $past = new PastModel();
        return $past->record(1);
    }

}