# Admin Users
- Users with roles `admin` can view all the `users` and can even `delete` users. This involes implementing eloquent relationships.
- `Tinker` is very useful when it comes to checking and attaching roles/permissions to a user.

# Routes for Large Application
- Organize your routes by taking it a part.
- Create a `web folder` and `api folder` in the `routes folder`. This is where you place each part of your routes.
- Go to `/App/Providers/RouteServiceProvider.php` to link these routes.
- Place `web.php` to `web folder` and `api.php` to `api folder`.
- Configure the `mapWebRoutes()`:
```php
->group(base_path('routes/web/web.php')
```
- Configure the `mapApiRoutes()`:
```php
->group(base_path('routes/api/api.php')
```
- For post related routes, create a `post.php` and place it on the created `web folder`. Do this on other routes you want to group.
- Create a method for that route:
- Example code:
```php
protected function mapPostsRoutes()
{
    Route::prefix('admin) // This is the link before the routes ex.: admin/posts/create
        ->middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/web/posts.php') // This is the new directory for POST ROUTES
}
```
- Add this newly created method:
```php
public function map()
{
    $this->mapPostsRoutes();
}
```

# Nesting Components
- You can also categorize components like what you did to routes.
- Create this following configuration:
- views
    - components
        - admin
        - sidebar
            - sidebar-component-1.blade.php
            - sidebar-component-2.blade.php
        - top-nav
            - top-nav-bar-1.blade.php
            - top-nav-bar-2.blade.php
- You can access this component by:
```blade
<x-admin.sidebar.sidebar-component-1>
{{--YOUR CODE HERE--}}
</x-admin.sidebar.sidebar-component-1>
```
