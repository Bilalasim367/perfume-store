# Deploy SAFARI Perfume Store to Render

## Step 1: Prepare Your App

1. Update `.env` for production:
```
APP_NAME=SAFARI
APP_ENV=production
APP_KEY=base64:kVGQrZyHBR3rem4nK6Jhr/2tdU9fTIoZhTl/CmV3UFQ=
APP_DEBUG=false
APP_URL=https://your-app-name.onrender.com
```

2. Create `build.sh` in project root:
```bash
#!/bin/bash
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

3. Update `composer.json` to add post-deploy script:
```json
"scripts": {
    "post-install-cmd": [
        "php artisan migrate --force",
        "php artisan config:cache"
    ]
}
```

## Step 2: Deploy to Render

1. Go to https://render.com → Sign up with GitHub

2. Click "New" → "Web Service"

3. Connect your GitHub repository: Bilalasim367/perfume-store

4. Configure:
   - **Name:** perfume-store
   - **Branch:** main
   - **Build Command:** composer install --no-dev --optimize-autoloader
   - **Start Command:** php artisan serve --host=0.0.0.0 --port=10000
   
   Or use: `php artisan serve --host=0.0.0.0 --port=$PORT`

5. Add Environment Variables:
   - `APP_ENV` = production
   - `APP_DEBUG` = false
   - `APP_URL` = your-render-url.onrender.com
   - `DB_HOST` = your-mysql-host
   - `DB_PORT` = 3306
   - `DB_DATABASE` = perfume_store
   - `DB_USERNAME` = your-db-user
   - `DB_PASSWORD` = your-db-password

6. Click "Create Web Service"

## Step 3: Add MySQL Database

1. In Render dashboard → "New" → "PostgreSQL" (or MySQL)
2. Note the connection details
3. Add DB credentials to your web service env vars

## Step 4: Run Migrations

After deploy, SSH into your service and run:
```bash
php artisan migrate
```

---

Want me to create the build.sh file for you?