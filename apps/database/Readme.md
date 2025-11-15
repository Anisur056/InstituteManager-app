# All Migration Atrisan Command

### Displays the status of each migration
```
php artisan migrate:status
```

### Creates, Seeds all table
```
php artisan migrate --seed
```

### Drops, Creates, Seeds all table
```
php artisan migrate:fresh --seed
```

### Create Single table by path
```
php artisan migrate --path=/database/migrations/2025_01_users.php
```

### Drop Single table by path
```
php artisan migrate:rollback --path=/database/migrations/2025_01_users.php
```

### Seed data from specific Seeder file.
```
php artisan db:seed --class=UsersSeeder
php artisan db:seed --class=UsersStudentsSeeder
```



# Extra Command ===========
### Drops all table, Create a table by path
```
php artisan migrate:fresh --path=/database/migrations/2025_01_users.php
```

### Create all tabless
```
php artisan migrate
```

### Delete last branch magrations Table
```
php artisan migrate:rollback
```

### Delete last created tables
```
php artisan migrate:rollback --step=1
```