<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model {
    use HasFactory;
    use HasUuids;
    protected $table ="website";
    protected $primaryKey ="website_id";
    protected $keyType ="string";
    protected $fillable =[
        "website_id",
        "judul",
        "deskripsi",
        "url",
        "logo",
        "bypass",
        "urut",
        "deleted_at",
    ];
}
