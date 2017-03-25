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
        $ip = $request->input('ip');
        $network = $request->input('network');
        $result = app('db')->insert('INSERT INTO object (name, ip, network, type) VALUES (?, ?, ?, ?)', [$name, $ip, $network, $type]);
        if($result) {
            return json_encode(array('success' => true, 'message' => 'success', 'data' => $this->getSubnetList()));
        }
        return json_encode(array('success' => false, 'message' => 'fail'));
    }
    // update
    public function updateSubnet(Request $request) 
    {
        # code...
        $subnet_id = $request->input('id');
        $name = $request->input('name');
        $ip = $request->input('ip');
        $network = $request->input('network');

        $result = app('db')
            ->table('object')
            ->where([
                ['id', $subnet_id],
                ['type', 'subnet'],
            ])
            ->update(['name' => $name, 'ip' => $ip, 'network' => $network]);
        if($result) {
            return json_encode(array('success' => true, 'message' => 'success', 'data' => $this->getSubnetList()));
        }
        return json_encode(array('success' => false, 'message' => 'fail'));
    }
    // // delete
    public function deleteSubnet(Request $request)
    {
        # code...
        $subnet_id = $request->input('id');
        $result = app('db')
            ->table('object')
            ->where([
                ['id', $subnet_id],
                ['type', 'subnet']
            ])
            ->delete();
        if($result) {
            return json_encode(array('success' => true, 'message' => 'success', 'data' => $this->getSubnetList()));
        }
        return json_encode(array('success' => false, 'message' => 'fail'));
    }
}
