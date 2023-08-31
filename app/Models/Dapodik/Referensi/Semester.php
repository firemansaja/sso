<?php

namespace App\Models\Dapodik\Referensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Semester extends Model {
    use HasFactory;
    protected $connection = "dapodik";
    protected $table = "ref_semester";
    protected $primaryKey = "semester_id";
    protected $keyType ="string";

    public function aktif() {
        return $this->where("aktif", "1");
    }
}
