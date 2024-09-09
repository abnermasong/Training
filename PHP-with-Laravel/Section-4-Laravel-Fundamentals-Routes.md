# Laravel Fundamentals
## Laravel structure overview
- `app` - contains the models and controllers.
- `bootstrap` - contains files where the whole application gets bootstrapped.
- `config` - contains configuration files of the application.
- `database` - contains the migrations.
- `public` - where public files located.
- `resources` - contains files that needs to be compiled.
- `routes` - where `web.php` is located. This file defines the application's routes.
- `test` - contain tests to test the application.
- `vendor` - contains libraries downloaded from using composer.
## Routes
- The following command is a simple example to create a route.
- in `/routes/web.php`, input:
```php
Route::get('/', function() {
    return "Hello World!";
});
```
- There are several methods in routing such as **GET, POST, PUT, PATCH, DELETE, and OPTIONS**.
