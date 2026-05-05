=== IMPORTANT: PHP Upload Settings ===

To allow large file uploads (up to 50 MB), you need to update your php.ini file.

For XAMPP on Windows:
1. Open: C:\xampp\php\php.ini
2. Find and change these lines:
   upload_max_filesize = 50M
   post_max_size = 55M
   max_execution_time = 120

3. Restart Apache from XAMPP Control Panel

For PHP built-in server:
   php -S 127.0.0.1:8000 -d upload_max_filesize=50M -d post_max_size=55M public/index.php

After changing, run migrations:
   php artisan migrate
   (or php artisan migrate:fresh --seed for a fresh start)

Also run:
   php artisan storage:link
   (to make uploaded files accessible in the browser)
