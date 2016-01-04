<?php

use CedricZiel\Webartisan\Http\Controllers\WebartisanController;

/**
 * Maintenance routes.
 */
Route::get('artisan', [
    'as'   => 'artisan',
    'uses' => WebartisanController::class . '@show'
]);

Route::post('artisan', [
    'as'   => 'artisan',
    'uses' => WebartisanController::class . '@execute'
]);
