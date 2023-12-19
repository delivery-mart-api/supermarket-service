# Supermarket System

Sistem Supermarket adalah aplikasi web berbasis PHP yang dirancang untuk manajemen dan operasional supermarket. Berikut adalah panduan singkat untuk menggunakan sistem ini.

## Persyaratan Sistem

Pastikan sistem memenuhi persyaratan berikut sebelum menggunakan aplikasi:

- PHP versi 7.3 atau lebih tinggi.
- Web server (disarankan menggunakan Apache atau Nginx).
- MySQL database.

## Instalasi

1. Clone repositori dari [GitHub](https://github.com/delivery-mart-api/supermarket-service) ke direktori lokal Anda.

    ```bash
    git clone https://github.com/delivery-mart-api/supermarket-service.git
    ```

2. Buka terminal dan pindah ke direktori proyek.

    ```bash
    cd supermarket-service
    ```

3. Salin file `.env.example` menjadi `.env`.

    ```bash
    cp .env.example .env
    ```

4. Buka file `.env` menggunakan editor teks dan sesuaikan pengaturan berikut sesuai dengan konfigurasi database Anda.

    ```env
    CI_ENVIRONMENT = production

    database.default.hostname = 127.0.0.1
    database.default.database = supermarket
    database.default.username = root
    database.default.password =
    database.default.DBDriver = MySQLi
    ```

5. Jalankan migrasi database untuk membuat skema tabel.

    ```bash
    php spark migrate
    ```
6. Jalankan seeder database untuk mengisi tabel.

    ```bash
    php spark db:seed ProductsSeeder
    php spark db:seed UserSeeder
    php spark db:seed BranchProductStockSeeder
    ```

7. Jalankan aplikasi pada port 8081.

    ```bash
    php spark serve --port 8081
    ```

## Mengakses Aplikasi

Buka browser web Anda dan akses aplikasi melalui [http://localhost:8081](http://localhost:8081). Pastikan web server Anda berjalan dengan benar.

## Masuk ke Aplikasi

Gunakan kredensial yang sesuai untuk masuk ke aplikasi:

Login sebagai admin : 
- **Username**: admin
- **Password**: password

Login sebagai branch : 
- **Username**: indoapril
- **Password**: password

## Panduan Pengguna

- **Admin Role**: Admin dapat mengelola detail produk dan menambahkan cabang.

- **Branch Role**: Branch dapat melihat dan mengelola stok produk di cabang mereka serta melihat order dan profit share yang terkoneksi dengan transaksi pada delivery service.
