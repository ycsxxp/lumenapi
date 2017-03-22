<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function getUserList() {
        return app('db')->select("SELECT * FROM users ORDER BY id DESC");
    }
    //
    public function userList() {
        return json_encode($this->getUserList());
    }

    // insert
    public function userInsert(Request $request)
    {
        $name = $request->input('name');
        $age = $request->input('age');
        $address = $request->input('address');
        $result = app('db')->insert('INSERT INTO users (name, age, address) VALUES (?, ?, ?)', [$name, $age, $address]);
        if($result) {
            return json_encode(array('success' => true, 'message' => 'success', 'data' => $this->getUserList()));
        }
        return json_encode(array('success' => false, 'message' => 'fail'));
    }
    // update
    public function userUpdate(Request $request) 
    {
        # code...
        $user_id = $request->input('id');
        $name = $request->input('name');
        $age = $request->input('age');
        $address = $request->input('address');

        $result = app('db')->table('users')->where('id', $user_id)->update(['name' => $name, 'age' => $age, 'address' => $address]);
        if($result) {
            return json_encode(array('success' => true, 'message' => 'success', 'data' => $this->getUserList()));
        }
        return json_encode(array('success' => false, 'message' => 'fail'));
    }
    // delete
    public function userDelete(Request $request)
    {
        # code...
        $user_id = $request->input('id');
        $result = app('db')->table('users')->where('id', '=', $user_id)->delete();
        if($result) {
            return json_encode(array('success' => true, 'message' => 'success', 'data' => $this->getUserList()));
        }
        return json_encode(array('success' => false, 'message' => 'fail'));
    }
}
