<?php


if (!function_exists('authenticated_check')) {
    function authenticated_check()
    {
        $ci = get_instance();

        if (!$ci->session->userdata('status')) {
            return redirect();
        } else {
            $role = $ci->session->userdata('role');
            $url = $ci->uri->segment(1);
            if ($url != $role) {
                if ($role == "admin") {
                    return redirect('admin/beranda');
                } else {
                    return redirect('user/beranda');
                }
            }

            if ($ci->uri->segment(2) == 'admin') {
                if ($ci->session->userdata('role_admin') != 'super') {
                    redirect('admin');
                }
            }
        }
    }
}
if (!function_exists('custom_tanggal')) {
    function custom_tanggal($tanggal)
    {
        $tanggal = explode('-', $tanggal);
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];

        return $tanggal[0] . ' ' . $bulan[$tanggal[1]] . ' ' . $tanggal[2];
    }
}

if (!function_exists('custom_hari')) {
    function custom_hari($hari)
    {
        $custom_hari = [
            0 => "Ahad",
            1 => "Senin",
            2 => "Selasa",
            3 => "Rabu",
            4 => "Kamis",
            5 => "Jum'at",
            6 => "Sabtu"
        ];

        return $custom_hari[$hari];
    }
}
