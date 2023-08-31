<?php

namespace App\Models\Dapodik;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiPTK extends Model
{
    use HasFactory;
    use HasUuids;

    protected $connection = "dapodik";
    protected $table = "mutasi_ptk";
    protected $primaryKey = "ptk_id";
    protected $keyType ="string";
}
