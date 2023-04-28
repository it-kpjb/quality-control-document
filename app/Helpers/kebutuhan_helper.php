<?php



if (!function_exists('divisi')) {
    function divisi($divisi)
    {
        switch ($divisi) {
            case '1':
                return "Engineering";
                break;
            case '2':
                return "HSE";
                break;
            case '3':
                return "Finance & Adm";
                break;
            case '4':
                return "Jetty & Material";
                break;
            case '5':
                return "Control & Instrumen";
                break;
            case '6':
                return "Mechanic";
                break;
            case '7':
                return "Operation";
                break;
        }
    }
}

if (!function_exists('status_berkas')) {
    function status_berkas($status_berkas)
    {
        switch ($status_berkas) {
            case '1':
                return '<span class="badge badge-info">Checking by Leader</span>';
                break;
            case '2':
                return '<span class="badge badge-info">Checking by Manager</span>';
                break;
            case '3':
                return '<span class="badge badge-warning">Revision from Leader</span>';
                break;
            case '4':
                return '<span class="badge badge-warning">Revision from Manager</span>';
                break;
            case '5':
                return '<span class="badge badge-success">Completed</span>';
                break;
            default:
                return '<span class="badge badge-secondary">Draft</span>';
                break;
        }
    }
}

if (!function_exists('convert_status_badge')) {
    function convert_status_badge($convert_status_badge)
    {
        switch ($convert_status_badge) {
            case '1':
                return '#17a2b8';
                break;
            case '2':
                return '#17a2b8';
                break;
            case '3':
                return '#ffc107';
                break;
            case '4':
                return '#ffc107';
                break;
            case '5':
                return '#28a745';
                break;
            default:
                return 'Draft';
                break;
        }
    }
}

if (!function_exists('convert_status')) {
    function convert_status($convert_status)
    {
        switch ($convert_status) {
            case '1':
                return 'Checking by Leader';
                break;
            case '2':
                return 'Checking by Manager';
                break;
            case '3':
                return 'Revision from Leader';
                break;
            case '4':
                return 'Revision from Manager';
                break;
            case '5':
                return 'Completed';
                break;
            default:
                return 'Draft';
                break;
        }
    }
}


if (!function_exists('convert_two_dates')) {
    function convert_two_dates($dateOut)
    {
        /*
        **this code for testing the deadline date
        **  
            $day = 3;
            $additonalDate = date_create(date('Y-m-d', strtotime("+$day days")));
            return  $diff->format("Deadline %R%a days more");

        */
        $date1 = date_create(date("Y-m-d"));
        $date2 = date_create($dateOut);
        $diff = date_diff($date1, $date2);
        $diff_results = $diff->format("%R%a");
        // dd(gettype());
        if (str_starts_with($diff_results, '-')) {
            return $diff->format('Late %a days');
        } else if (str_starts_with($diff_results, '+')) {
            return $diff->format('%a days more');
        }
    }
}

if (!function_exists('tipe_pengajuan')) {
    function tipe_pengajuan($tipe_pengajuan)
    {
        switch ($tipe_pengajuan) {
            case '1':
                return "Perpanjangan SKCK";
                break;
            case '2':
                return "Pembuatan SKCK Baru";
                break;
            case '3':
                return "Selesai";
                break;
            case '4':
                return "Pengajuan Ditolak";
                break;
        }
    }
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
