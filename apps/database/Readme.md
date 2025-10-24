# All Migration Atrisan Command

### Drops all table, Creates all table, Seeds all table
```
php artisan migrate:fresh --seed
```

### Drop a table, Create a table by path
```
php artisan migrate:fresh --path=/database/migrations/2025_01_users.php
```

### Seed data from specific Seeder file.
```
php artisan db:seed --class=YourSpecificSeeder
```

### Create all tabless
```
php artisan migrate
```

### Create all table, Seed all table
```
php artisan migrate --seed
```

### Delete last branch magrations Table
```
php artisan migrate:rollback
```

### Delete last created tables
```
php artisan migrate:rollback --step=1
```

### Displays the status of each migration
```
php artisan migrate:status
```

