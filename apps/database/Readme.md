# All Migration Atrisan Command

### My Choice
```
php artisan migrate:fresh --seed
```

### Displays the status of each migration
```
php artisan migrate:status
```

### Creates all table
```
php artisan migrate
```

### Drops/Delete all table
```
php artisan migrate:rollback
```

### Creates, Seeds all table
```
php artisan migrate --seed
```

### Drops, Creates, Seeds all table
```
php artisan migrate:fresh --seed
```




# Extra Command =================================================
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

### Drops all table, Create a table by path
```
php artisan migrate:fresh --path=/database/migrations/2025_01_users.php
```

### Delete last branch magrations Table
```
php artisan migrate:rollback
```

### Delete last created tables
```
php artisan migrate:rollback --step=1
```