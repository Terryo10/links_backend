<?php


use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('organisations', OrganisationController::class);
    $router->resource('jobs', JobsController::class);
    $router->resource('expertise', ExpertiseController::class);
    $router->resource('price_controls', PriceController::class);





});
