<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\AuthorController;

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

$router->get('/authors', 'AuthorController@index');
$router->get('/authors/{authorId}', 'AuthorController@show');
$router->post('/authors', 'AuthorController@store');
$router->put('/authors/{authorId}', 'AuthorController@update');
$router->patch('/authors/{authorId}', 'AuthorController@update');
$router->delete('/authors/{authorId}', 'AuthorController@destroy');
