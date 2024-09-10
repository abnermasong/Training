# Laravel Blade Templating Engine
Blade is the simple, yet powerful templating engine that is included with Laravel.

## Master Layout
You can create a seprate file for your general layout which you can re-use when routing to different routes.
- `yield` - where the content will inserted in the root blade file.
- `extends` - is where you locate the root blade file.
- `section` - is where you input the HTML code that will be sent to yield.
- `stop` - is the end point of the section or content.
- `{{$data}}` - echo the data.

#### This is the master layout:
`/resources/views/layouts/app.blade.ph`
```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aj Training</title>
</head>
<body>   
<div class="container">
    @yield('content')
</div>
    @yield('footer')
</body>
</html>
```
- To utilize the master layout, use `@extends('layouts.app')`
```blade
@extends('layouts.app')

@section('content')
<!--code goes here-->
@stop
```
- By using `@section` and `@stop`, you can insert your desired HTML code into the `@yield('content')`.
- You can also iterate data by using `@`. Be sure to close the iteration by ending the loop with `@end`.
```blade
@section('content')
  @if (count($people))
    <ul>
        @foreach ($people as $person)
            <li>
                {{$person}}
            </li>
        @endforeach
    </ul>
@stop
```
