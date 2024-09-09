# Database - Eloquent/ORM
- ORM stands for `Object-Relational Mapper`.
- `Model` is used to interact with the `database` or `migration`.
- To create a `Model`, use `php artisan make:model Posts -m`
- `-m` stands for migration. So it will also create a `migration` for `Post` model.

### Eloquent supports relationships between models:
- one-to-one relationship,
- one-to-many relationship,
- many-to-many relationship.

### Mass Assignment
- Adding `protected $fillable` is required to prevent `MassAssignmentException`.
```php
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

```

### Soft Deleting
- Eloquent has built-in support for soft deletes, which allows you to mark records as "deleted" without actually deleting them from the database.
- The "deleted" data is added with the attribute `deleted_at`.
