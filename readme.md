# Almahajja Application build by laravel
**_[Laravel](https://laravel.com/docs/5.7) PHP Framework with [AdminLTE2](https://adminlte.io/docs/2.4/installation)_**


## Almahajja Setup:
composer install                   # Install backend dependencies
nano .env                          # Update database credentials
import almahajjadb.sql on db       # Import Data
php artisan storage:link           # symbolic link into storage
chmod 755 storage/ -R              # give wr access
chmod 755 bootstrap/cache/ -R      # give wr access
php artisan key:generate           # Generate new keys for Laravel
php artisan config:clear           # Clear the config
php artisan config:cache           # Update cache
npm install                        # Install node dependencies
npm run production                 # Compile assets for production


