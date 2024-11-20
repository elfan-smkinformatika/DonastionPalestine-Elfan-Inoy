# SELAMAT DATANG DI PROJECT Elfan & Inoy
**Membuat Website Berbasis Bootstrap dan PHP**

## Link Untuk Design UI
https://www.figma.com/design/TXJFeLDeOhM4XtL5F8M2Xh/UI-Website---Donasi-Palestine?node-id=1-2&t=4nCjd5XYqjws6qx4-1

## Panduan Lebih Lanjut

### Alur Kerja Website Donasi untuk Palestina

#### 1. Halaman Beranda (Home)
- **Sisi User**: 
  - Melihat informasi singkat tentang tujuan donasi, manfaat, dan kondisi terkini warga Palestina.
  - Statistik donasi terkini (jumlah total donasi dan jumlah donatur) ditampilkan.
- **Sisi Programmer**:
  - Menyediakan informasi statis tentang donasi.
  - Membuat komponen statistik yang menarik data dari database untuk menghitung total donasi dan jumlah donatur.
  - Menampilkan tombol **Donasi Sekarang** yang mengarahkan ke formulir donasi.

#### 2. Halaman Informasi Program Donasi
- **Sisi User**: 
  - Melihat detail program donasi, seperti dana yang disalurkan ke pendidikan, kesehatan, atau infrastruktur di Palestina.
- **Sisi Programmer**:
  - Membuat halaman dinamis atau statis yang memuat informasi tentang setiap program donasi.
  - Menyusun struktur database untuk menyimpan detail program dan menampilkan data dari database di halaman ini.

#### 3. Halaman Formulir Donasi
- **Sisi User**: 
  - Mengisi form donasi, termasuk nama, nominal, metode pembayaran (bank transfer, e-wallet, kartu kredit), dan pilihan anonim.
- **Sisi Programmer**:
  - Membuat form dengan validasi sisi client (JavaScript) dan server (PHP) untuk memastikan data benar.
  - Memasukkan data donasi ke database dengan status "menunggu pembayaran".
  - Menyediakan kolom `is_anonymous` untuk pengaturan anonimitas donatur.

#### 4. Proses Pembayaran
- **Sisi User**: 
  - Setelah mengisi formulir, diarahkan ke halaman dengan detail pembayaran sesuai metode yang dipilih.
- **Sisi Programmer**:
  - Menampilkan instruksi pembayaran atau mengintegrasikan API gateway pembayaran (misalnya Xendit atau Midtrans).
  - Menyimpan status donasi (pending, paid, failed) di database.

#### 5. Halaman Konfirmasi Pembayaran
- **Sisi User**: 
  - Mengunggah bukti transfer atau menunggu notifikasi otomatis dari gateway pembayaran.
- **Sisi Programmer**:
  - Menyediakan halaman untuk mengunggah bukti pembayaran manual.
  - Mengaktifkan callback/webhook untuk memperbarui status donasi di database dan menyimpan bukti pembayaran.

#### 6. Halaman Riwayat Donasi (User Terdaftar)
- **Sisi User**: 
  - User terdaftar dapat melihat riwayat donasi.
- **Sisi Programmer**:
  - Membuat halaman riwayat donasi berdasarkan `user_id`, menyaring data berdasarkan status donasi.

#### 7. Halaman Dashboard Admin (Backend)
- **Sisi Admin**: 
  - Melihat daftar donasi, memverifikasi pembayaran, dan mengelola program donasi.
- **Sisi Programmer**:
  - Membuat dashboard dengan fitur:
    - Manajemen Donasi: melihat dan memverifikasi donasi, memperbarui status pembayaran.
    - Manajemen Program: menambah, mengedit, atau menghapus program donasi.
    - Laporan Donasi: statistik dan laporan yang dapat diunduh (format CSV).

#### 8. Notifikasi dan Update Otomatis
- **Sisi User**: 
  - Menerima email konfirmasi saat donasi berhasil dan pemberitahuan penerimaan donasi.
- **Sisi Programmer**:
  - Mengatur notifikasi email menggunakan pustaka seperti PHPMailer.
  - Mengirim email otomatis saat status donasi berubah menjadi "paid".

#### 9. Halaman Kontak dan FAQ
- **Sisi User**: 
  - Menghubungi tim melalui form kontak atau membaca FAQ.
- **Sisi Programmer**:
  - Membuat halaman kontak dengan form yang mengirim data ke email admin.
  - Membuat halaman FAQ (statis atau dinamis).

#### 10. Halaman Laporan dan Transparansi Donasi
- **Sisi User**: 
  - Melihat laporan transparansi seperti dana terkumpul dan kemajuan program donasi.
- **Sisi Programmer**:
  - Menyediakan halaman transparansi dengan data dari database tentang total dana yang terkumpul dan penyaluran dana.
  - Admin dapat mengunggah laporan PDF atau grafik perkembangan dana.

---

> ### Catatan:
> Project ini dibuat dan di kembangkan oleh Ackmad Elfan Purnama Dan Firza Inayah

---
#### Tips github
1. git config --global user.name "elfan-smkinformatika" //untuk memperkenalkan diri
2. git add . //menSelect semua file yang akan di rubah
3. git commit -m "telah memperbarui" //untuk menyampaikan pesan perubahan
4. git push origin main //untuk mengirim perubahan ke github, menggunakan main karena origin di githubnya "main"

---
#### Query Untuk Export Dan Import
* mysqldump -u root -p db_saya > backup_db_saya.sql //Export
* mysql -u username -p nama_database < backup_nama_database.sql //Import
