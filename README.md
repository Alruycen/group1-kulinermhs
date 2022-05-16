# Ada beberapa catatan, silakan di baca sampai paling bawah:
# 1. Prosedur

## Pertama, download branch ini dengan mencet Code > Download Zip.
## Kalau sudah, diextract di laragon/www atau xampp/htdocs.
## Kedua, import dulu database kulinermahasiswa ke mysql dengan phpmyadmin.
## Nanti di phpmyadmin, create new database, beri nama "kulinermahasiswa", baru diimpor dengan file .sql hasil extract tadi.
## Ketiga, ubah nama folder yang sudah diextract tadi dari group1-kulinermhs-kulinermahasiswa menjadi klnmhs (hanya agar menjadi lebih singkat, bisa diganti dengan yang lain).
## Kalau sudah, silakan buka di browser dengan localhost/klnmhs atau localhost/nama folder yang kalian ubah tadi

# 2. Fitur

## Pertama, search engine terletak hampir di semua menu.
## Beberapa search engine memiliki datalist yang sudah diembed dengan code AJAX, sehingga bisa membaca data dari database (kalau ada)
## Kedua, membaca data yang spesifik seperti harga atau rating ada di beberapa menu.
## Kita bisa search dengan perbandingan harga atau mereknya, tetapi tidak dengan ratingnya.
## Ketiga, kita bisa menjadi user yang memiliki role admin dengan register.
## Setelah selesai register, maka user akan tampil di halaman para pengembang di menu tentangkami.
## Keempat, sidebarnya bisa ditekan sehingga data yang muncul lebih spesifik, seperti nama dan deskripsi/ merek dan lokasi.

# Catatan:

## Kalau mau bisa muncul profil usernya, pertama buka lagi phpmyadmin
## Di database kulinermahasiswa, terdapat tabel users, edit data yang kalian baru tambahkan
## Di bagian role, ubah bagian yang kosong menjadi admin dan pencet GO
## Setelah itu, refresh website kulinermahasiswa dan login dengan password yang dibatasi 11 digit (disarankan pakai NIM)

# Fungsi Role Admin:

## Menambah data baru yang ada di setiap menu
## Mengubah data yang sudah ada di setiap menu
## Menjadi wajah di menu tentangkami

# Catatan berakhir di sini.
