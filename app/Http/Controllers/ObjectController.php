<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        // public $table = 'object';
    }

    public function getSubnetList() {
        $type = 'subnet';
        return app('db')->table('object')->where('type', $type)->orderBy('id', 'desc')->get();
    }
    //
    public function subnetList() {
        return json_encode($this->getSubnetList());
    }

    // insert
    public function createSubnet(Request $request)
    {
        $type = 'subnet';

        $name = $request->input('name');
        $age = '192.168.1.1';
        $address = $request->input('address');
        $result = app('db')->insert('INSERT INTO object (name, ip, network, type) VALUES (?, ?, ?, ?)', [$name, $age, $address, $type]);
        if($result) {
            return json_encode(array('success' => true, 'message' => 'success', 'data' => $this->getSubnetList()));
        }
        return json_encode(array('success' => false, 'message' => 'fail'));
    }
    // update
    // public function userUpdate(Request $request) 
    // {
    //     # code...
    //     $user_id = $request->input('id');
    //     $name = $request->input('name');
    //     $age = $request->input('age');
    //     $address = $request->input('address');

    //     $result = app('db')->table('users')->where('id', $user_id)->update(['name' => $name, 'age' => $age, 'address' => $address]);
    //     if($result) {
    //         return json_encode(array('success' => true, 'message' => 'success', 'data' => $this->getUserList()));
    //     }
    //     return json_encode(array('success' => false, 'message' => 'fail'));
    // }
    // // delete
    // public function userDelete(Request $request)
    // {
    //     # code...
    //     $user_id = $request->input('id');
    //     $result = app('db')->table('users')->where('id', '=', $user_id)->delete();
    //     if($result) {
    //         return json_encode(array('success' => true, 'message' => 'success', 'data' => $this->getUserList()));
    //     }
    //     return json_encode(array('success' => false, 'message' => 'fail'));
    // }
}
