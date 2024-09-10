# Laravel - Components
- You can break down an HTML file and divide it into an individual file by using components.
- This is very useful especially when reusing parts of page onto other pages.
- Using components are very similar with `layouts`, `section`, and `includes`.

### Setting up your components:
- Create a `master.blade.php` file. This file will contain the HTML code you want to reuse.
- To be able to make use of layout of `master.blade.php`, call it by using the following code: 
```blade
<x-master>

{{-- YOUR CODE GOES HERE --}}

</x-master>
```
- Whenever you make used of your components, you have to add `x-` with the `component's name` then incase it with an open and close tag.
