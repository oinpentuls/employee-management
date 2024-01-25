# Employee Management

Mini employee management


## Instalasi

Clone repo ini
```sh
git clone https://github.com/oinpentuls/employee-management.git
```

install dependensi untuk laravel dan vue nya
```sh
composer install
```

```sh
npm install
```

### migrasi
Pastikan telah mengganti value di .env dengan database yang sesuai, misal

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_management
DB_USERNAME=root
DB_PASSWORD=
```
lalu jalankan migrasi dan seeder-nya

```sh
php artisan migrate --seed
```

### development
jalankan ini untuk backend
```sh
php artisan serve
```

dan ini untuk frontend
```sh
npm run dev
```
