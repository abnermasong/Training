# Laravel Sessions
- Since HTTP driven applications are stateless, sessions provide a way to store information about the user across multiple requests. 
### Example code:
```php
 public function index(Request $request)
    {
        //Setting up sessions
        $request->session()->put(['name'=>'aj']);
        
        //Updating sessions
        session(['more sessions'=>'replaced session']);
        
        // Deleting sessions
        request->session()->forget('more sessions');
        
        // Delete all sessions
         $request->session()->flush();
        
        //Reading sessions
        return $request->session()->all();
        
    }
```
