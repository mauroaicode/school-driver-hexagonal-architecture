<?php

namespace Core\BoundedContext\Admin\School\Infrastructure\Persistence\Eloquent;


use Illuminate\Http\Request;
use Tenancy\Identification\Contracts\Tenant;
use Tenancy\Tenant\Events\{Created, Deleted, Updated};
use Tenancy\Identification\Concerns\AllowsTenantIdentification;
use Tenancy\Identification\Drivers\Http\Contracts\IdentifiesByHttp;
use Illuminate\Database\{Eloquent\Builder, Eloquent\Factories\HasFactory, Eloquent\Model};

class SchoolModel extends Model implements Tenant, IdentifiesByHttp
{
    use HasFactory, AllowsTenantIdentification;

    protected $table = 'schools';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['name', 'slug'];

    protected $dispatchesEvents = [
        'created' => Created::class,
        'updated' => Updated::class,
        'deleted' => Deleted::class
    ];

    public function getTenantKeyName(): string
    {
        return 'slug';
    }

    /**
     * The actual value of the key for the tenant Model.
     *
     * @return string
     */
    public function getTenantKey(): string
    {
        return $this->slug;
    }


    public function __construct(array $attributes = [])
    {
        $this->setConnection('mysql');
        parent::__construct($attributes);
    }


    public function tenantIdentificationByHttp(Request $request): ?Tenant
    {
        return $this->query()
            ->where('slug', $request->segment(1))
            ->first();

    }

    public function scopeFindById(Builder $query, string $value): Builder
    {
        return $query->where('id', $value);
    }

    public function scopeFindBySlug(Builder $query, string $value): Builder
    {
        return $query->where('slug', $value);
    }
}
