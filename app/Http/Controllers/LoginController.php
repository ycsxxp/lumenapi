<?php

namespace App\Http\Controllers;

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
    public function login() {
        $login_status = array('success' => true, 'message' => 'success');
        return json_encode($login_status);
    }
}
