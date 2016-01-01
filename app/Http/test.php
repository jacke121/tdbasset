<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/30
 * Time: 20:11
 */

Route::get('zq','ZqController@index');
Route::get('zq/{zid}', 'ZqController@show');
Route::get('zq/apply', 'ZqController@apply');
Route::resource('zqm','member\ZqController');
Route::resource('zqList','member\ZqListController');