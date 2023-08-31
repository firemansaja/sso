<?php

use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Session;

function bypassCode($username, $peran_id_str, $semester_id) {
    return JWT::encode([
        "username" => $username,
        "peran_id_str" => $peran_id_str,
        "semester_id" => $semester_id,
    ], md5("20325258"), "HS256");
}
function hasSesi($id) {
    return Session::has($id);
}
function sesi($id) {
    return (hasSesi($id)) ? Session::get($id) : null;
}
