<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/9/19
 * Time: 18:39
 */

namespace App\Http\Controllers\Front;



use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class TestController extends  Controller
{
    /**
     *
     */
    public function  index()
    {
        //$results = DB::select('select * from ad_users where id = :id', ['id' => 2]);
        // $result = DB::insert('insert into ad_users (username) values ( ?)', ['Dayle']);
//        $result = DB::delete('delete from ad_users where id=3');
//        $result = DB::statement('drop table products');
        // $result = DB::transaction(function () {
        //  DB::table('products')->delete();
        //   DB::table('posts')->delete();
        //});
        //  dd($result);
        // return view('front.test.index', compact('users'));
        // $users = DB::table('users')->get();

        //$user = DB::table('users')->where('username', 'zhuxishun')->first();
        //echo $user->username;

        //$roles = DB::table('users')->lists('roles');
        // return view('front.test.index', compact('users'));
        //$users = DB::table('users')->select('username', 'nickname as user_nickname')->get();
         //dd($users);
       // $query = DB::table('users')->select('username');
       // $users = $query->addSelect('password')->get();
       // dd($users);
       // $users = DB::table('users')
           // ->select(DB::raw('count(*) as user_count, username'))
            //->where('username', '<>', 1)
            //->groupBy('username')
//            ->get();
//        dd($users);
//        $users = DB::table('users')
//            ->join('contacts', 'users.id', '=', 'contacts.user_id')
//            ->join('orders', 'users.id', '=', 'orders.user_id')
//            ->select('users.*', 'contacts.phone', 'orders.price')
//            ->get();
//        dd($users);
//        $first = DB::table('users')
//            ->whereNull('roles');
//
//        $users = DB::table('users')
//            ->whereNull('nickname')
//            ->union($first)
//            ->get();
//            dd($users);

//
//        $users = DB::table('users')
//            ->whereIn('id', [1, 2, 3])
//            ->get();
//        dd($users);
//        $users = DB::table('users')
//            ->whereNotNull('updated_at')
//            ->get();
//        dd($users);
//       $user= DB::table('users')
//            ->where('username', '=', 'laozhu')
//            ->orWhere(function ($query) {
//                $query->where('roles', '<>', '管理员');
//            })
//            ->get();
//        dd($user);
//       $id= DB::table('users')->insertGetId(
//            ['username' => 'wy', 'qq' => 0]);
//        dd($id);
//        DB::table('users')
//            ->where('id', 10)
//            ->update(['qq' => 1]);
       // DB::table('users')->where('id', '=', 3)->delete();






    }
}