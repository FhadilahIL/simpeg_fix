<?php


function userLog($aksi, $id)
{
    $CI = &get_instance();
    date_default_timezone_set('Asia/Jakarta');
    $data = [
        'id_logs' => '',
        'kegiatan' => $aksi,
        'waktu' => date('Y-m-d H:i:s'),
        'id_pegawai' => $id
    ];
    $CI->db->insert('logs', $data);
}
