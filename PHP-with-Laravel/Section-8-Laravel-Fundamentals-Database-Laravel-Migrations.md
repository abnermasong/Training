# Database - Laravel Migrations
Migration refers to the process of modifying the application's database schema
###  Creating migrations 
- Create a migration using `php artisan make:migration name_of_migration --create="table_name"`
- After creating a migration, use `php artisan migrate` to runs all pending migrations in the application's database.
- To view this migration, you can go to `.../database/migration/`.

## More migrations commands:

| Command               | Description
------------------------|------------------------------------
|`php artisan migrate` | Runs all the pending migrations.
|`migrate:fresh` | Drops all the table in the database and runs from scratch.
|`migrate:refresh` | Reset and re-run the migrations.
|`migrate:reset` | Rolls back all the migrations.
|`migrate:rollback` | Rolls back to the last migrations.
|`migrate:status` | Displays the status of each migrations.
