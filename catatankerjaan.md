## Catatan Aplikasi SILOCKI
---
- Selasa, 20 Agustus 2019
1. Menambah column pada table yang terdapat database SILOCKI, yaitu pada table INDIKATORKINERJAUTAMA.
2. Menambah table pengumuman.
3. Membuat fitur "TAMBAH PENGUMUMAN" pada akun ADMIN, dan memunculkan data pengumuman pada masing-masing akun.
   
- Rabu, 21 Agustus 2019
1. Merubah cara penginputan tanggal pada aplikasi, sebelumnya diconvert dan dimasukkan ke database, sekarang diconvert pada view (untuk membuat fitur ketepatan waktu), termasuk pada helper_log.
2. Membuat css untuk masing-masing controller agar view terlihat lebih rapi, bebas dari tag style.
3. Menambah value dan conditional pada menu edit yang terdapat pada controller, sehingga bisa memunculkan data dari database pada setiap form.

- Kamis, 22 Agustus 2019
1. Menambah column konversi 120 pada menu tambah dan edit IKU.
2. Menambah ke table indikator konversi 120.
3. Menambah style pada logout modal, agar lebih tebal.
4. Menambah style pada log aktifitas.

- Jumat, 23 Agustus 2019
1. Menambah settingan css pada mystyle.css untuk merubah warna inputan form agar lebih mudah dibaca.
2. Memperbaiki settingan css pada pejabat.css di menu Detail Kontrak Bawahan.
3. Merubah tampilan tanggal pada menu Browse Kontrak Kinerja.
4. Memperbaiki tooltip pada browse Kontrak Kinerja, browse IKU, dan Manajemen User. 

- Senin, 26 Agustus 2019
1. Membuat fitur adendum (sementara dibuat seperti fitur edit, nanti akan ditambahkan validasi setelah mengetahui aturannya).
2. Memperbaiki kolom satuan pengukuran dari table indikatorkinerjautama dari enum ke varchar.
3. membuat ajax untuk aksi:
   - hapus kontrak,
   - hapus iku,
   - hapus logbook,
   - kirim logbook,
   - rekam logbook baru
4. merubah pengisian logbook dari navbar menjadi modal agar lebih mudah membuat ajax penambahan logbook baru.

- Selasa, 27 Agustus 2019
1. Menyelesaikan fitur ajax.
2. Membuat fitur notifikasi ke pejabat dan bawahan (on progress).

- Rabu, 28 Agustus 2019
1. Membuat notifikasi ke Telegram approval dan tidak approval Kontrak Kinerja.
2. Membuat notifikasi ke Telegram approval dan tidak approval Indikator Kinerja Utama.
3. Membuat notifikasi ke Telegram approval dan tidak approval Logbook.
4. Membuat notifikasi Dashboard Pejabat.
5. Merubah tgl approve di table logbook menjadi NULL sehingga tanggal approval tidak tercetak ketika logbook belum diapprove
6. Menghapus PHP SWITCH dan SELECT OPTION bulan diganti menjadi bulan, tidak huruf.
7. Perbaikan CSS pada tabel logbook.
8. Merubah timeout refresh ajax.
9. Menghapus tulisan dari 5 logbook pada halaman Logbook selesai.

- Kamis, 05 September 2019
1. Membuat fitur generate logbook otomatis.
2. Membuat logbook tercetak pdf.

- Rabu, 18 September 2019
1. Merubah token dari uniqid ke mt_rand()
2. Merubah setingan printout logbook

- Sabtu, 21 September 2019
1. Membuat ajax memanggil detail logbook pada menu monitoring

- Senin, 23 September 2019
1. Memindahkan preview logbook PDF ke dalam Modal
2. Membuat switch pengumuman dan tutorial (not finished)