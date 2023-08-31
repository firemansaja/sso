<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebController extends Controller {
    function index(Request $req) {
        return view("website", [
            "nomor" => 1,
            "daftar_website" => Website::orderBy('urut')
                ->whereNull("deleted_at")
                ->get(),
        ]);
    }
    function simpan(Request $req) {
        if ($req->has("submit")) :
            try {
                if ($req->file("logo") == null) :
                    if ($req->website_id != null) :
                        $web = Website::find($req->website_id);
                        $logo = $web->logo;
                        goto execute;
                    endif;
                    $logo = null;
                endif;

                if (!file_exists(public_path("logo"))) : mkdir(public_path("logo"), 0777, true); endif;
                $file = $req->file("logo");
                $filename = date("YmdHis") . "." . $file->getClientOriginalExtension();
                $file->move(public_path("logo"), $filename);
                $logo = "logo/$filename";

                execute:
                Website::updateOrCreate(["website_id" => $req->website_id], [
                    "judul" => $req->judul,
                    "deskripsi" => $req->deskripsi,
                    "url" => $req->url,
                    "logo" => $logo,
                    "bypass" => $req->bypass,
                    "urut" => $req->no_urut,
                    "deleted_at" => null,
                ]);
                return back()->with("sukses", "Data Website Berhasil di Simpan!");
            } catch (\Throwable $th) {
                dd($th);
            }
        endif;
        return back();
    }
    function simpan_urutan(Request $req) {
        if ($req->has("submit")) :
            foreach ($req->website_id as $key => $website_id) {
                $web = Website::find($website_id);
                $web->urut = $req->no_urut[$key];
                $web->save();
            }
            return back()->with("sukses", "Nomor Urut Berhasil di Simpan!");
        endif;
    }
    function hapus($website_id) {
        try {
            $web = Website::find($website_id);
            $web->deleted_at = now;
            $web->save();
            return back()->with("sukses", "Website $web->judul, Berhasil dihapus!");
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
