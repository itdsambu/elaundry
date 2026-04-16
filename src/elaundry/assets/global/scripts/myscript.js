const message = $('.flash-data').data('flashdata');

if (message) {
    // toastr.error(`${message}.`, 'Gagal !!', { "timeOut": 0 });
    Swal.fire({
        position: 'top-start',
        type: 'success',
        title: 'Data berhasil disimpan !!',
        showConfirmButton: false,
        timer: 1500,
        confirmButtonClass: 'btn btn-primary',
        buttonsStyling: false,
    })
}