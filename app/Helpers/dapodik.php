<?php

use App\Models\Dapodik\PesertaDidik;
use App\Models\Website;

function daftar_website_by_bypass($bypass) {
    return Website::where('bypass', $bypass)
        ->whereNull("deleted_at")
        ->orderBy("urut")
        ->get();
}
function rombel_saat_ini($peserta_didik_id) {
    return PesertaDidik::where("pd.peserta_didik_id", $peserta_didik_id)
        ->select("rombel.nama as nama_rombel")
        ->join("anggota_rombel", "anggota_rombel.peserta_didik_id", "=", "pd.peserta_didik_id")
        ->join("rombel", "rombel.rombongan_belajar_id", "=", "anggota_rombel.rombongan_belajar_id")
        ->where("jenis_rombel", 1)
        ->orderBy("semester_id", DESC)
        ->first()
        ->nama_rombel;
}
