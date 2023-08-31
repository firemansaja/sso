<?php

namespace App\Http\Controllers;

use App\Models\Dapodik\Pengguna;
use App\Models\Website;
use Illuminate\Http\Request;

class AdminController extends Controller {
    function index() {
        return view("dashboard", [
            "EWebsiteAktif" => Website::whereNull("deleted_at")->count(),
            "EWebsiteTidakAktif" => Website::whereNotNull("deleted_at")->count(),
            "EPenggunaAktif" => Pengguna::whereNull("deleted_at")->count(),
            "EPenggunaTidakAktif" => Pengguna::whereNotNull("deleted_at")->count(),
        ]);
    }
}
