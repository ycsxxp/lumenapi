<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->post('login', 'LoginController@login');

$app->post('logout', 'LoginController@logout');

// ===系统===
// 帐号管理
$app->get('getUsers', 'UserController@userList');
// insert
$app->post('insertAccount', 'UserController@userInsert');
// update
$app->post('updateAccount', 'UserController@userUpdate');
// delete
$app->post('deleteAccount', 'UserController@userDelete');
