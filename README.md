# Webartisan for Laravel 5

Provides a browser-based artisan console for your application.

## Warning!

**This addon is insecure by default! You need to secure the endpoints or strangers _will_ execute 
commands on your application.**

## Configuration

Add the ServiceProvider to `config/app.php`:

```php
    CedricZiel\Webartisan\WebartisanServiceProvider:class,
```

Now you need to override the routes shipped by the plugin, to secure them with a middleware of your choice.

Here's an example to secure the endpoints with the `auth` middleware:

```php
use CedricZiel\Webartisan\Http\Controllers\WebartisanController;

// Application routes ...

/**
 * Maintenance routes.
 */
Route::get('artisan', [
    'as'   => 'artisan',
    'middleware' => 'auth',
    'uses' => WebartisanController::class . '@show'
]);

Route::post('artisan', [
    'as'   => 'artisan',
    'middleware' => 'auth',
    'uses' => WebartisanController::class . '@execute'
]);
```

## License & Credits

This library is based on the work of Ron Shpasser (https://github.com/shpasser/GaeSupportL5).

This library is licensed under the MIT License.
