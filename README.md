1. install dependencies

`composer install`

2. .env

Update following:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=learning_db
DB_USERNAME=root
DB_PASSWORD=
```

3. Run migration

`php artisan migrate`

4. Run seeder for admin & a user.

`php artisan db:seed --class=UsersTableSeeder`

credentials:
```
admin:
	email: er.mts1993@gmail.com
	password: password

user:
	email: bhautikjani@gmail.com
	password: password
```

5. Create link for storage.

`php artisan storage:link`

6. Generate JWT token

`php artisan jwt:secret`
