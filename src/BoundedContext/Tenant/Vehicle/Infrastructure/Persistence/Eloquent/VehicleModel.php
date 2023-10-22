<?php

namespace Core\BoundedContext\Tenant\Vehicle\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    protected $table = 'vehicles';
    protected $keyType = 'string';
    public $incrementing = false;

    const CAR = 'car';
    const MOTORCYCLE = 'motorcycle';
    const TRUCK = 'truck';

    const AVAILABLE = 'available';
    const NOT_AVAILABLE = 'not_available';

    protected $guarded = ['id'];
    protected $fillable = ['brand', 'model', 'badge', 'type', 'create_user_id', 'state'];
}
