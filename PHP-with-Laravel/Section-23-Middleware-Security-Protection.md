#Middleware - Security / Protection
- Middleware provide a convenient mechanism for inspecting and filtering HTTP requests entering your application.
- To create a middleware, use the command `php artisan make:middleware NameOfMiddleware`. This will create a middleware `NameofMiddleware` in the `/app/http/middleware/`.
- To set your laravel web application to maintenance mode, use the command `php artisan down`.
- To revert maintenance mode, use the command `php artisa up`.
### Example code:
```php
//web.php
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;

Auth::routes();

//new syntax for Assigning Middleware to Routes
Route::get('/middleware', function(){

    return"Middleware Role";

})->middleware(RoleMiddleware::class);
```
```php
//RoleMiddleware
  public function handle(Request $request, Closure $next): Response
    {
        return redirect('/');
        return $next($request);
    }
```
