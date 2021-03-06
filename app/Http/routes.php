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


$app->post('author', ['as' => 'author-store', 'uses' => 'AuthorController@store']);


$app->delete('author/{id}', ['uses'=>'AuthorController@destroy']);

$app->get('author/index', ['uses'=>'index','uses' => 'AuthorController@index']);

$app->post('author/{id}',['uses'=>'AuthorController@probar']);

$app->post('authors', [
    'as' => 'authors-store', 'uses' => 'AuthorController@store'
]);

$app->post('documents', [
    'as' => 'documents-store', 'uses' => 'DocumentController@store'
]);

$app->post('documents/{id}','DocumentController@update');
