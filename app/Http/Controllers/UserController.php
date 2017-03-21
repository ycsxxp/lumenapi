<?php

namespace App\Http\Controllers;

class UserController extends Controller
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
    public function userList() {
        // $user_list = array(
        //                 array('id' => 1, 'name' => 'ceshi', 'age' => 10, 'address' => 'Chengdu Road No.1')
        //             );
        $results = app('db')->select("SELECT * FROM users");
        return json_encode($results);
    }
}
