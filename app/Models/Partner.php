<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use Auditable;
    use HasFactory;

    public const PARTNER_TYPE_SELECT = [
        '1' => 'vendor',
        '2' => 'donatur',
        '3' => 'badan',
    ];

    public $table = 'partners';

    public static $searchable = [
        'partner_type',
        'partner_code',
        'partner_name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'partner_type',
        'partner_code',
        'partner_name',
        'partner_address',
        'partner_email',
        'partner_phone',
        'partner_pic',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}