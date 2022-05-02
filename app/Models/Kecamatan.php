<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kecamatan extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'kecamatans';

    public static $searchable = [
        'kd_kec',
        'nm_kec',
        'kd_bast',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kd_kab_id',
        'kd_kec',
        'nm_kec',
        'kd_bast',
        'lat',
        'lng',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kd_kab()
    {
        return $this->belongsTo(Kabupaten::class, 'kd_kab_id', 'kd_kab');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    protected function getPrimary()
    {
        return 'kd_kec';
    }
}
