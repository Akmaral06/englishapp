# EnglishApp — Setup Instructions

## After extracting the project, run these commands:

### 1. Install dependencies (if not done yet)
```
composer install
```

### 2. Run migrations and seeders (REQUIRED — creates roles table)
```
php artisan migrate:fresh --seed
```

### 3. Create admin user
```
php artisan tinker
```
Then paste:
```php
$u = App\Models\User::create(['name'=>'admin','email'=>'admin@admin.com','password'=>bcrypt('admin123')]);
$u->assignRole('admin');
exit
```

### 4. Link storage
```
php artisan storage:link
```

### 5. Start server
```
php artisan serve
```

---

## Fix upload limit (if files won't upload)

Open your XAMPP `php.ini` (usually at `C:\xampp\php\php.ini`) and change:

```
upload_max_filesize = 50M
post_max_size = 55M
memory_limit = 256M
```

Then restart Apache in XAMPP Control Panel.

---

## Roles available
- **admin** — manage users
- **teacher** — create lessons
- **reviewer** — approve/reject lessons
- **student** — view lessons and track progress
