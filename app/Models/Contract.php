<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 *
 *
 * @property int $id
 * @property int $rental_price
 * @property int $security_deposit
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $owner_fk_id
 * @property int $tenant_fk_id
 * @property int $property_fk_id
 * @property int $currency_type_fk_id
 * @property int $guarantor_fk_id
 * @property-read \App\Models\CurrencyType $currency
 * @property-read \App\Models\Guarantor $guarantor
 * @property-read \App\Models\Owner $owner
 * @property-read \App\Models\Property $property
 * @property-read \App\Models\Tenant $tenant
 * @method static \Illuminate\Database\Eloquent\Builder|Contract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereCurrencyTypeFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereGuarantorFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereOwnerFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract wherePropertyFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereRentalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereSecurityDeposit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereTenantFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
        'rental_price',
        'security_deposit',
        'description',
        'start_date',
        'end_date',
        'property_fk_id',
        'owner_fk_id',
        'tenant_fk_id',
        'guarantor_fk_id',
        'currency_type_fk_id',
    ];

    protected function endDate(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                $startDate = Carbon::parse($this->start_date);
                $endDate = Carbon::parse($value);

                return $startDate->diff($endDate);
            },
        );
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(
            Property::class,
            'property_fk_id',
        );
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            Owner::class,
            'owner_fk_id',
        );
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(
            Tenant::class,
            'tenant_fk_id',
        );
    }

    public function guarantor(): BelongsTo
    {
        return $this->belongsTo(
            Guarantor::class,
            'guarantor_fk_id',
        );
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(
            CurrencyType::class,
            'currency_type_fk_id',
        );
    }
}
