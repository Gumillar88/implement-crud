# Proyek CRUD Laravel

## Versi

- **Laravel:** 11
- **PHP:** >= 8.2.4
- **Database:** MySQL atau SQLite

## Instalasi dan Konfigurasi

### 1. Mengunduh Proyek

Anda dapat mengunduh proyek ini melalui GitHub atau file ZIP:

- **GitHub:** [Implement CRUD GitHub Repository](https://github.com/Gumillar88/implement-crud.git)
- **File ZIP:** [Download ZIP](https://drive.google.com/drive/folders/1hQ4-ud63Hscka6Bb8lGWDawfFPaww-UT?usp=sharing)

### 2. Menyiapkan Database

#### **Untuk MySQL:**

1. **Buat Database:**

Buat database baru di MySQL dengan nama `product_order_db`.

2. **Import Database:**

Impor file SQL berikut ke dalam database:

- **File SQL:** `product_order_db.sql`

Atau, jalankan perintah migrasi:

```bash
php artisan migrate
```

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=product_order_db
DB_USERNAME=root
DB_PASSWORD=
```

Untuk SQLite:
Konfigurasi .env:

Ubah pengaturan database di file .env menjadi:

```bash
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```
Pastikan file database SQLite (database.sqlite) telah dibuat di direktori database/.

2. Jalankan Migrasi:

```bash
php artisan migrate
```

3. Menjalankan Aplikasi
Jalankan server Laravel dengan perintah berikut:

```bash
php artisan serve
```

Akses aplikasi melalui URL berikut:

Beranda: http://127.0.0.1:8000/
Daftar Produk: http://127.0.0.1:8000/products
Tambah Pesanan: http://127.0.0.1:8000/orders/create
Catatan: Halaman http://127.0.0.1:8000/orders tidak ada dan akan dialihkan ke halaman create.
<br>
Fitur Proyek
1. CRUD Produk
<p>
Daftar Produk: Menampilkan daftar produk yang ada.    
</p>
Tambah Produk: Formulir untuk menambah produk baru.
<br>
Edit Produk: Formulir untuk mengedit informasi produk.
<br>
Hapus Produk: Menghapus produk dari database.
<br>
3. Pesanan Produk
Formulir Pesanan: Menambahkan pesanan produk dengan jumlah yang dipilih.
Perhitungan Otomatis: Menghitung total harga pesanan berdasarkan jumlah produk.

4. DataTables
Tabel Dinamis: Menggunakan DataTables untuk menampilkan data pembelian dengan fitur pencarian, pengurutan, dan paginasi.
Stack Teknologi
Backend: Laravel 11
Database: MySQL atau SQLite
Frontend: Bootstrap 5, jQuery, DataTables
