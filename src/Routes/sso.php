<?php
/**
 * Created by PhpStorm.
 * User: taixu
 * Date: 16/2/24
 * Time: 下午4:17
 */

Route::group(['prefix' => 'admin/sso'], function () {

    Route::get('checkSync', ['uses' => 'Admin\SsoController@checkSync']);

    Route::post('handelSyncToken', ['uses' => 'Admin\SsoController@handelSyncToken']);

    Route::get('sync', function () {
        return view('vendor.sso.sync');
    });
});