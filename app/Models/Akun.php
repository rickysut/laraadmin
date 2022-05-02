<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Akun extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        '1' => 'Aktif',
        '0' => 'Non-aktif',
    ];

    public const PENDEKATAN_SELECT = [
        'Aset'  => 'Aset',
        'Beban' => 'Beban',
    ];

    public $table = 'akuns';

    public static $searchable = [
        'kd_akun',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kd_akun',
        'nama_akun',
        'status',
        'pendekatan',
        'jenis',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
