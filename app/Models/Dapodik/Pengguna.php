<?php

namespace App\Models\Dapodik;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengguna extends Model {
    use HasFactory;
    use HasUuids;

    protected $connection = "dapodik";
    protected $table = "pengguna";
    protected $primaryKey = "pengguna_id";
    protected $keyType ="string";

    public function sekolah(): HasOne {
        return $this->hasOne(Sekolah::class, "sekolah_id", "sekolah_id");
    }
    public function mutasi_pd(): HasOne {
        return $this->hasOne(MutasiPD::class, "peserta_didik_id", "peserta_didik_id");
    }
    public function mutasi_ptk(): HasOne {
        return $this->hasOne(MutasiPTK::class, "ptk_id", "ptk_id");
    }
}
