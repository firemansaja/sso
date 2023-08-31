<?php

namespace App\Http\Controllers;

use App\Models\Dapodik\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller {
    function aktif() {
        return view("pengguna.aktif", [
            "nomor" => 1,
            "daftar_pengguna" => Pengguna::whereNull("deleted_at")
                ->orderBy("peran_id_str", "DESC")
                ->orderBy("nama")
                ->get(),
        ]);
    }
    function tidak_aktif() {
        error_reporting(0);
        return view("pengguna.tidak_aktif", [
            "nomor" => 1,
            "daftar_pengguna" => Pengguna::whereNotNull("deleted_at")
                ->orderBy("peran_id_str", "DESC")
                ->orderBy("nama")
                ->get(),
        ]);
    }
}
