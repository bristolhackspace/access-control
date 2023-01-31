<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use Auditable;
    use HasFactory;

    public $table = 'machines';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'code',
        'induction',
        'active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function machineInductions()
    {
        return $this->hasMany(Induction::class, 'machine_id', 'id');
    }

    public function machineLogins()
    {
        return $this->hasMany(Login::class, 'machine_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
