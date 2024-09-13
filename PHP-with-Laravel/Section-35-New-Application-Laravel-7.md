# Permissions and Roles - CRUD
- The methods used in this section were also used and discussed in the previous sections.

# Protecting Routes Globally & Locally
### Global Implementation
- In previous section, we have categorized routes by its use case and used `RouteServiceProvider.php` to make it functional.
- By using `RouteServiceProvider.php`, we can also configure its middleware.
```php
protected function mapPostsRoutes()
{
    Route::prefix('admin)
        ->middleware(['web', 'auth', 'role:admin']) // SET THIS MIDDLEWARE TO PROTECT A ROUTE FROM UNAUTHORIZED PERSONNEL
        ->namespace($this->namespace)
        ->group(base_path('routes/web/posts.php')
}
```
### Local Implementation
```php
Route::middleware('auth')->group(function(){
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
   //INSERT ROUTES HERE
});
```
