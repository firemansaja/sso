<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller {
    function dashboard() {
        return view("home", [
            "daftar_bypass" => collect(["Ya", "Tidak"])
        ]);
    }
}
