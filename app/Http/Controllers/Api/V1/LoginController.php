<?php

namespace App\Http\Controllers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function login(Request $request) {
        $file = new Filesystem();
        $loginUser = $request->input('loginUser');
        $loginPass = $request->input('loginPass');

        // 获取存储的帐号信息
        $login_status = array('success' => false, 'message' => '');
        $contents = $file->get('../config/users.json');
        $users_list = json_decode($contents);
        foreach ($users_list as $key => $value) {
            if($key === $loginUser && md5($loginPass) === $value->password) {
                $login_status = array('success' => true, 'message' => 'success');
                return response()->json($login_status);
            }
        }
        $login_status = array('success' => false, 'message' => '帐号或密码错误');
        return response()->json($login_status);
    }

    public function logout(Request $request) {
        $login_status = array('success' => true, 'message' => 'success');
        return json_encode($login_status);
    }
}
