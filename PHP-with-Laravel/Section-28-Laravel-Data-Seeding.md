# Data Seeding
- Laravel includes the ability to seed your database with data using seed classes.
- All seed classes are stored in the `database/seeders` directory.
- By default, a `DatabaseSeeder` class is defined for you. From this class, you may use the `call` method to run other seed classes, allowing you to control the seeding order.
```php
//DatabaseSeeder
public function run(): void
    {
        User::factory(10)->create(); //change 10 to the number you want to seed.
    
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
```
- To generate a seeder, use the command `php artisan make:seeder UserSeeder`.
- To begin seeding, use the command `php artisan db:seed` or `php artisan db:seed --class=UserSeeder` for specifying a seeder class.

# Using Model Factories
- You can use model factories to conveniently generate large amounts of database records.
### Example code for creating 50 users by changing model factories:
```php
use App\Models\User;
 
/**
 * Run the database seeders.
 */
public function run(): void
{
    User::factory()
            ->count(50)
            ->hasPosts(1)
            ->create();
}
```
