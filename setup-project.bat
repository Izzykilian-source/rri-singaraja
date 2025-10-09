@echo off
echo === Laravel Auto Setup ===
cd /d %~dp0

echo Installing PHP dependencies...
composer install

echo Installing JS dependencies...
npm install

if not exist ".env" (
  echo Creating .env file...
  copy .env.example .env
)

echo Generating Laravel key...
php artisan key:generate

echo Starting local server...
start cmd /k "php artisan serve"

echo Starting Vite (frontend)...
npm run dev
