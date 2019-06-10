const flashData = $('.flash-data').data('flashdata');

//Sweet Alert FlashData Kontrak Kinerja
if (flashData) {
    Swal.fire({
        title: 'Kontrak Kinerja',
        text: 'Berhasil ' + flashData + '.' + ' ' + 'Silahkan melanjutkan kegiatan anda!',
        type: 'success'

    });
}

//Sweet Alert Hapus Kontrak
$('.hapus-kontrak').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Konfirmasi Hapus Kontrak Kinerja',
        text: "Apakah anda yakin untuk menghapus data ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus data'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;

        }
    })
})

const flashDataIKU = $('.flashdata').data('flashdataiku');

//Sweet Alert FlashData IKU
if (flashDataIKU) {
    Swal.fire({
        title: 'Indikator Kinerja Utama',
        text: 'Berhasil ' + flashDataIKU + '.' + ' ' + 'Silahkan melanjutkan kegiatan anda!',
        type: 'success'

    });
}

//Sweet Alert Hapus IKU
$('.buttonhapusiku').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Konfirmasi Hapus IKU',
        text: "Apakah anda yakin untuk menghapus data ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '<i class="fas fa-fw fa-trash"></i> Hapus data',
        cancelButtontext: '<i class="fas fa-fw fa-times"></i> Batal'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;

        }
    })
});

const flashDataLogbook = $('.flashdata-logbook').data('flashdatalogbook');

//Sweet Alert FlashData logbook
if (flashDataLogbook) {
    Swal.fire({
        title: 'Sukses !',
        text: 'Logbook berhasil ' + flashDataLogbook + '.' + ' ' + 'Silahkan melanjutkan kegiatan anda!',
        type: 'success'

    });
}

//Sweet Alert Hapus Logbook
$('.button-hapuslogbook').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Konfirmasi Hapus Logbook',
        text: "Apakah anda yakin untuk menghapus data ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '<i class="fas fa-fw fa-trash"></i> Hapus logbook',
        cancelButtontext: '<i class="fas fa-fw fa-times"></i> Batal'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;

        }
    })
});

//Sweet Alert Kirim Logbook ke atasan
$('.button-kirimlogbook').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Konfirmasi Kirim Logbook ke atasan',
        text: "Apakah anda yakin untuk mengirim data logbook ini ke atasan anda? Data yang sudah dikirim tidak dapat diubah lagi!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085D6',
        cancelButtonColor: '#d33',
        confirmButtonText: '<i class="fas fa-fw fa-paper-plane"></i> Kirim logbook',
        cancelButtontext: '<i class="fas fa-fw fa-times"></i> Batal'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;

        }
    })
});

//Const KK Bawahan
const flashDataKontrakBawahan = $('.flashdata-kontrakbawahan').data('flashdatakontrakbawahan');

//Sweet Alert FlashData Kontrak Bawahan
if (flashDataKontrakBawahan) {
    Swal.fire({
        title: 'Sukses !',
        text: 'Kontrak Kinerja berhasil ' + flashDataKontrakBawahan + '.' + ' ' + 'Silahkan melanjutkan kegiatan anda!',
        type: 'success'

    });
}
console.log('Kontrak Kinerja berhasil ' + flashDataKontrakBawahan + '.');


//Sweet Alert Approve Kontrak Bawahan 
$('.button-buttonapprovekontrak').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Konfirmasi Persetujuan Kontrak Kinerja Bawahan',
        text: "Apakah anda yakin untuk menyetujui Kontrak Kinerja ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085D6',
        cancelButtonColor: '#d33',
        confirmButtonText: '<i class="fas fa-fw fa-check"></i> Setuju',
        cancelButtontext: '<i class="fas fa-fw fa-times"></i> Batal'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;

        }
    })
});

//Sweet Alert Batal Approve Kontrak Bawahan 
$('.button-buttonbatalapprovekontrak').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Konfirmasi Pembatalan Persetujuan Kontrak Kinerja Bawahan',
        text: "Apakah anda yakin untuk membatalkan persetujuan Kontrak Kinerja ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085D6',
        confirmButtonText: '<i class="fas fa-fw fa-times"></i> Ya, Batalkan',
        cancelButtontext: '<i class="fas fa-fw fa-times"></i> Kembali'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;

        }
    })
});


//const IKU Bawahan
const flashDataIKUBawahan = $('.flashdata-ikubawahan').data('flashdataikubawahan');

//Sweet Alert FlashData IKU Bawahan
if (flashDataIKUBawahan) {
    Swal.fire({
        title: 'Sukses !',
        text: 'Indikator Kinerja Utama berhasil ' + flashDataIKUBawahan + '.' + ' ' + 'Silahkan melanjutkan kegiatan anda!',
        type: 'success'

    });
}
console.log(flashDataIKUBawahan);


//Sweet Alert Approve IKU Bawahan
$('.button-buttonapproveiku').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Konfirmasi Pembatalan Persetujuan Indikator Kinerja Utama Bawahan',
        text: "Apakah anda yakin untuk menyetujui IKU ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085D6',
        cancelButtonColor: '#d33',
        confirmButtonText: '<i class="fas fa-fw fa-check"></i> Setuju',
        cancelButtontext: '<i class="fas fa-fw fa-times"></i> Batal'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;

        }
    })
});

//Sweet Alert Batal Approve IKU
$('.button-buttonbatalapproveiku').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Konfirmasi Pembatalan Persetujuan IKU Bawahan',
        text: "Apakah anda yakin untuk membatalkan persetujuan IKU ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085D6',
        confirmButtonText: '<i class="fas fa-fw fa-times"></i> Ya, Batalkan',
        cancelButtontext: '<i class="fas fa-fw fa-times"></i> Kembali'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;

        }
    })
});

//const Logbook Bawahan
const flashDataLogbookBawahan = $('.flashdata-logbookbawahan').data('flashdatalogbookbawahan');

if (flashDataLogbookBawahan) {
    Swal.fire({
        title: 'Sukses !',
        text: 'Logbook Bawahan berhasil ' + flashDataLogbookBawahan + '.' + ' ' + 'Silahkan melanjutkan kegiatan anda!',
        type: 'success'

    });
}
console.log('Logbook Bawahan berhasil ' + flashDataLogbookBawahan);

//Sweet Alert Approve Logbook
$('.button-setujulogbookbawahan').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Konfirmasi Persetujuan Logbook Bawahan',
        text: "Apakah anda yakin untuk menyetujui Logbook ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085D6',
        cancelButtonColor: '#d33',
        confirmButtonText: '<i class="fas fa-fw fa-check"></i> Setuju',
        cancelButtontext: '<i class="fas fa-fw fa-times"></i> Batal'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;

        }
    })
});

//Sweet Alert Pembatalan Logbook
$('.button-tidaksetujulogbookbawahan').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Konfirmasi Pembatalan Logbook Bawahan',
        text: "Apakah anda yakin untuk membatalkan persetujuan Logbook ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085D6',
        confirmButtonText: '<i class="fas fa-fw fa-times"></i> Ya, Batalkan',
        cancelButtontext: '<i class="fas fa-fw fa-times"></i> Kembali'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;

        }
    })
});

//const Manage User
const flashDataManageUser = $('.flashdata-manageuser').data('flashdatamanageuser');

if (flashDataManageUser) {
    Swal.fire({
        title: 'Sukses !',
        text: 'Pegawai ' + flashDataManageUser + '.',
        type: 'success'

    });
}
console.log('Pegawai ' + flashDataManageUser);

$('.button-hapuspegawai').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Konfirmasi Hapus Data Pegawai',
        text: "Apakah anda yakin untuk menghapus data pegawai ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085D6',
        confirmButtonText: '<i class="fas fa-fw fa-trash"></i> Ya, Hapus',
        cancelButtontext: '<i class="fas fa-fw fa-times"></i> Kembali'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;

        }
    })
});

//Init Datatables User
$(document).ready(function () {
    $('#datauser').DataTable({
        "lengthChange": false,
        "ordering": false,
        "info": false,

    });
});


console.log('Script berhasil diload!!!!!');