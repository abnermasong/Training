# Controllers
- Controllers manage user requests and generate appropriate responses.
- Controllers can group related request handling logic into a single class. For example, a `UserController` class might handle all incoming requests related to users, including `showing`, `creating`, `updating`, and `deleting users`.
- By default, controllers are stored in the `app/Http/Controllers` directory.
- To create a new controller, use the command `php artisan make:controller ControllerName`.
- Adding `--resource` to the command generates `create`, `read`, `update`, and `delete` (CRUD) methods inside the class.
  `php artisan make:controller ControllerName --resource`
### Example code:
```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
       public function show_list()
    {
        $people = ['Abner', 'Aj', 'Jean', 'Mercy'];

        return view('list', compact('people'));
    }
  //...
}
```
### To utilize this `PostController` in `web.php`:
```php
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\PostController; //uncomment this when using the other method

Route::get('/list', '\App\Http\Controllers\PostController@show_list');
//Route::get('/list', [PostController::class, 'show_list']); //other method

```
