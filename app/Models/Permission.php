<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const GRP_TITLE_SELECT = [];

    public const PERM_TYPE_SELECT = [
        '1' => 'Create',
        '2' => 'Edit',
        '3' => 'Show',
        '4' => 'Delete',
        '5' => 'Access',
    ];

    public $table = 'permissions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'perm_type',
        'grp_title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
