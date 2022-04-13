/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

$(document).ready(function(){
    // for tostr alert
    let flashdata_gagal = $('.flashdata_gagal').data('flashdata');
    let flashdata_sukses = $('.flashdata_sukses').data('flashdata');
    if (flashdata_gagal) {
        iziToast.warning({
            title: 'Gagal!',
            message: flashdata_gagal,
            position: 'topRight'
        });
    }else if(flashdata_sukses) {
        iziToast.success({
            title: 'Berhasil!',
            message: flashdata_sukses,
            position: 'topRight'
        });
    }
    
    // show hide password pada form login
    $('.showhide').click(function () {
        let pw = document.getElementById("pw");
        if (pw.type === "password") {
            pw.type = "text";
            $('i.showhide').removeClass("fa-eye-slash");
            $('i.showhide').addClass("fa-eye");
        }else{
            pw.type = "password";
            $('i.showhide').removeClass("fa-eye");
            $('i.showhide').addClass("fa-eye-slash");
        }
    });

    // show hide ubah password
    $('#showHidePassword').click(function(){
        if ($(this).is(':checked')) {
            $('input.showHideUbhPw').attr('type', 'text');
        }else{
            $('input.showHideUbhPw').attr('type', 'password');
        }
    });

    $('.logout').on('click', function (e) {
        e.preventDefault();
        let href = $(this).attr('href');
        swal({
            title: 'Yakin Ingin Logout ?',
            text: '',
            icon: 'warning',
            buttons: ['Batal', 'Logout'],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                document.location.href = href;
            }
        });
    });

    $('.ubah-password').on('click', function (e) {
        e.preventDefault();
        swal({
            title: 'Yakin ingin mengubah password saat ini ?',
            text: '',
            icon: 'warning',
            buttons: ['Batal', 'Ya, Ubah Password'],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $('#formUbahPassword').submit();
            }
        });
    });

    $('#table-2').on('click', '.hapus', function (e) {
        e.preventDefault();
        let href = $(this).attr('href');
        swal({
            title: 'Yakin ingin menghapus data ini ?',
            text: '',
            icon: 'warning',
            buttons: ['Batal', 'Ya, Hapus'],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                document.location.href = href;
            }
        });
    });

    $('#jurusan_select').change(function(){
        let id_jurusan = this.value;
        if (id_jurusan != ''){
            $.ajax({
                url: base_url + '/admin/siswa/get_kelas_by_jurusan_id',
                method: 'POST',
                data: {id_jurusan : id_jurusan},
                async : true,
                dataType : 'json',
                success : function(data) {
                    $('#kelas').html(data);
                }
            })
        }
    });
});
