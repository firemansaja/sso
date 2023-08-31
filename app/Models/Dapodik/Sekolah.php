<?php

namespace App\Models\Dapodik;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model {
    use HasFactory;
    use HasUuids;

    protected $connection = "dapodik";
    protected $table = "sekolah";
    protected $primaryKey = "sekolah_id";
    protected $keyType ="string";
}
