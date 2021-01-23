# Kerja Praktek
# Surat Keterangan yang dikeluarkan kampus STMIK Sumedang
## Cara Penginstalan
Buka File sql lalu import pada database yang anda punya dan sesuaikan namanya dengan .env
Pada database ini kita buat default user admin dan wakil ketua, karena jika anda mendaftar akan otomatis menjadi **Mahasiswa**
Berikut adalah user default yang telah kami buat :

**Admin**
- Email : didansergia@gmail.com
- Password : 1234567890

**Wakil Ketua**
- Email : naon@gmail.com
- Password : 1234567890

Kemudian sesudah mengimport database maka anda ubah terlebih dahulu nama database dan password yang akan dituju sesuai dengan localhost yang ada punya.
buka file yang sudah anda download tadi menggunakan terminal (saya disini menggunakan Git Bash)
lalu jalankan **composer install** pada terminal yang anda pakai, 
kemudian ketik **php artisan key:generate** pada terminal,
lalu ketik **php artisan serve** pada terminal untuk menjalankan localhostnya.
