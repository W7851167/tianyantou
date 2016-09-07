<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//解析url，通过url设置子域名
$urls =  parse_url(Request::Url());
$host =  $urls['host'];
$prefix = explode('.', $host)[0];

if (strtolower($prefix) == 'www') {
    $namespace = 'Front';
} else if(strtolower($prefix) == 'admin') {
    $namespace = 'Admin';
} else { //解决composer时自动查找localhost的问题
    $namespace = 'Front';
}

//域名分组
Route::group(array('domain' => $host, 'namespace'=>$namespace), function() use($namespace){
    require_once  __DIR__.'/Routes/' . $namespace .'.php';
});

//Route::get('test','TestController@index');
