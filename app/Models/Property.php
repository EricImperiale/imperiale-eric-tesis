<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id
 * @property string $address
 * @property int $address_number
 * @property string|null $city
 * @property string $province
 * @property string $neighborhood
 * @property int $postal_code
 * @property int $total_area
 * @property int $covered_area
 * @property string|null $description
 * @property int $rental_price
 * @property int|null $expenses
 * @property int|null $floor
 * @property string|null $apartment_number
 * @property int|null $is_for_professional_use
 * @property int $rooms
 * @property int $bedrooms
 * @property int $bathrooms
 * @property int $property_type_fk_id
 * @property int $owner_fk_id
 * @property-read mixed $full_address
 * @property-read \App\Models\Owner $owner
 * @property-read \App\Models\PropertyType $propertyType
 * @method static \Illuminate\Database\Eloquent\Builder|Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property query()
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereAddressNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereApartmentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereBedrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCoveredArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereExpenses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereIsForProfessionalUse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereOwnerFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property wherePropertyTypeFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereRentalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereRooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereTotalArea($value)
 * @mixin \Eloquent
 */
class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'address_number',
        'city',
        'state',
        'neighborhood',
        'zip_code',
        'total_area',
        'covered_area',
        'description',
        'rental_price',
        'expenses',
        'floor',
        'apartment_number',
        'is_for_professional_use',
        'rooms',
        'bedrooms',
        'bathrooms',
        'property_type_fk_id',
        'owner_fk_id',
    ];

    // TODO: Hay manera de no hace tantro codigo.
    protected function fullAddress(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->propertyType->property_type_id !== 1) {
                    return $this->propertyType->name . ' en ' . $this->address . ' ' . $this->address_number . ', ' . $this->neighborhood . ', ' . $this->province;
                }

                return $this->propertyType->name . ' en ' . $this->address . ' ' . $this->address_number . ', ' . $this->province . ', ' . $this->neighborhood;
            }
        );
    }

    protected function floor(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                return $value ?? 'N/A';
            }
        );
    }

    protected function apartmentNumber(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                return $value ?? '0';
            }
        );
    }

    protected function rentalPrice(): ?Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                return number_format($value, '0', '.');
            }
        );
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            Owner::class,
            'owner_fk_id',
        );
    }

    public function propertyType(): BelongsTo
    {
        return $this->belongsTo(
            PropertyType::class,
            'property_type_fk_id',
        );
    }
}
