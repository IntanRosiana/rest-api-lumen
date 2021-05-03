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

$router->get('/', function () use ($router) {
    return "Ini halaman index";
});

//buat router api ambil data (GET)
$router->get('/pegawai', ['uses' => 'PegawaiController@index']);

//buat router api untuk insert data (POST)
$router->post('/pegawai/insert', ['uses' => 'PegawaiController@insert']);

//buat router api update (DELETE)
$router->put('/pegawai/update/{nip}', ['uses' => 'PegawaiController@update']);

//buat router API delete (DELETE)
$router->delete('/pegawai/delete/{nip}', ['uses' => 'PegawaiController@delete']);
