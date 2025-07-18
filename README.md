# production-app
system daily production

# installation
1. clone aplikasi
2. pastikan composer sudah terinstall jalankan perintah => composer install
3. salin file .env.example menjadi .env
4. untuk database bisa disesuaikan dengan device
   
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=root
   DB_PASSWORD=   # isi jika ada password
   
6. generate app key => php artisan key:generate
7. jalankan npm => npm install , npm run dev atau npm run build
8. generate ui auth bootstrap => php artisan ui bootstrap --auth
9. jalankan migrasi dan data seeder => php artisan migrate --seed
10. jalankan server => php artisan serve


# Role User
1. Admin
    Username: EMP001
    Password: 123
2. Supervisor
    Username: EMP002
    Password: 123
3.Operator
    Username: EMP003
    Password: 123

