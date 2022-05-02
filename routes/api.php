<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Provinsi
    Route::apiResource('provinsis', 'ProvinsiApiController');

    // Kabupaten
    Route::apiResource('kabupatens', 'KabupatenApiController');

    // Kecamatan
    Route::apiResource('kecamatans', 'KecamatanApiController');

    // Desa
    Route::apiResource('desas', 'DesaApiController');

    // Satker
    Route::apiResource('satkers', 'SatkerApiController');
});
