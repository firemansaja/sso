<?php

namespace App\Models\Dapodik;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidik extends Model {
    use HasFactory;
    use HasUuids;

    protected $connection = "dapodik";
    protected $table = "pd";
    protected $primaryKey = "peserta_didik_id";
    protected $keyType ="string";
}
