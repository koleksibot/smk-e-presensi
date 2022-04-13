$(document).ready(function(){
    let signaturePad = new SignaturePad(document.getElementById('signaturePad'));
    function responsiveCanvas() {
        $('#signaturePad').each(function (e) {
            let parentWidth = $(this).parent().outerWidth();
            $(this).attr('width', parentWidth);
            $(this).attr('height', "160px");
        });
        signaturePad.clear();
    }

    $(window).ready(function () {
        responsiveCanvas();
    });

    $(window).resize(function () {
        responsiveCanvas();
    });

    $('#formAbsen select[name="status"]').on('change', function(){
        if ($(this).val() != 'hadir' && $(this).val() != 'dinas diluar'){
            $('#formAbsen .surat').show();
        }else{
            $('#formAbsen .surat').hide();
        }
    });

    $('#formAbsen button[type="button"]').click(function () {
        let status = $('#formAbsen select[name="status"]').val();
        let surat = $('#formAbsen .surat input[name="surat"]').val();
        let ket = $('#formAbsen input[name="keteranganPulang"]').val();
        if (status != 'hadir' && surat == '') {
            $('.emptySurat').show();
        } else if (signaturePad.isEmpty()) {
            $('.emptyTtd').text('Anda harus tanda tangan!').removeClass('text-muted').addClass('text-danger');
        } else {
            let ttd = signaturePad.toDataURL('image/png');
            $('.emptyTtd').text('Menyatakan kejujuran dalam absensi online!').removeClass('text-danger').addClass('text-muted');
            $('#output').val(ttd);
            if (ket == "Pulang cepat") {
                swal({
                    title: 'Yakin Ingin Pulang Cepat?',
                    text: '',
                    icon: 'warning',
                    buttons: ['Batal', 'Ya, Pulang Cepat'],
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $('#formAbsen').submit();
                    }
                });
            }else{
                $('#formAbsen').submit();
            }
        }
    });

    $('#formAbsen .clear').click(function () {
        $('.emptyTtd').text('Menyatakan kejujuran dalam absensi online!').removeClass('text-danger').addClass('text-muted');
        signaturePad.clear();
    });

    setInterval(cekJamAbsen, 1000);

    function cekJamAbsen() {
        let url = base_url + "user/cek_jam_absen";
        fetch(url).then(response => response.json())
            .then(function (data) {
                $(".keteranganDatang").val(data.ket_absen_datang);
                $(".keteranganPulang").val(data.ket_absen_pulang);
                $(".jam").val(data.jam);
            }).catch(function (e) {
                console.log('gagal');
            });
    }
});