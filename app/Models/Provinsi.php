<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provinsi extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'provinsis';

    public static $searchable = [
        'kd_prop',
        'nm_prop',
        'kd_bast',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kd_prop',
        'nm_prop',
        'kd_bast',
        'lat',
        'lng',
        'kd_satker_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function kd_satker()
    {
        return $this->belongsTo(Satker::class, 'kd_satker_id', 'kd_satker');
    }

    protected function getPrimary()
    {
        return 'kd_prop';
    }
}
