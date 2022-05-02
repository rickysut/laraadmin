<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kabupaten extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'kabupatens';

    public static $searchable = [
        'kd_kab',
        'nama_kab',
        'kd_bast',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kd_prop_id',
        'kd_kab',
        'nama_kab',
        'kd_bast',
        'lat',
        'lng',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kd_prop()
    {
        return $this->belongsTo(Provinsi::class, 'kd_prop_id', 'kd_prop');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    protected function getPrimary()
    {
        return 'kd_kab';
    }
}
