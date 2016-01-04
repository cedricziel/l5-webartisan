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

Here's an example to secure the endpoints with the `auth` middleware (`app/Providers/RouteServiceProvider`):

```php
    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });

        /**
         * Webartisan routes
         */
        $router->group([
            'namespace'  => '\CedricZiel\Webartisan\Http\Controllers',
            'middleware' => ['web', 'auth']
        ], function ($router) {
            Route::get('artisan', [
                'as'         => 'artisan',
                'middleware' => 'auth',
                'uses'       => 'WebartisanController@show'
            ]);

            Route::post('artisan', [
                'as'         => 'artisan',
                'middleware' => 'auth',
                'uses'       => 'WebartisanController@execute'
            ]);
        });
    }
```

## License & Credits

This library is based on the work of Ron Shpasser (https://github.com/shpasser/GaeSupportL5).

This library is licensed under the MIT License.
