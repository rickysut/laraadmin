<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BackdateBanpem extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'backdate_banpems';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'year',
        'kd_akun_id',
        'nom_pagu',
        'nom_realisasi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kd_akun()
    {
        return $this->belongsTo(Akun::class, 'kd_akun_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
