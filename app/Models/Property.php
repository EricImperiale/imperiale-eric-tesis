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
 * @property int state
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
 * @property int $address_number
 * @property string $state
 * @property int $zip_code
 * @property string|null $image
 * @property string|null $image_alt
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $caracteristics
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereImageAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereZipCode($value)
 * @property-read mixed $characteristics
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
        'image',
        'image_alt',
    ];

    // TODO: ¿Se puede mejorar?
    protected function fullAddress(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->propertyType->property_type_id !== 1) {
                    return $this->propertyType->name . ' en ' . $this->address . ' ' . $this->address_number . ', ' . $this->neighborhood . ', ' . $this->state;
                }

                return $this->propertyType->name . ' en ' . $this->address . ' ' . $this->address_number . ', ' . $this->neighborhood . ', ' . $this->state;
            }
        );
    }
    protected function characteristics(): Attribute
    {
        return Attribute::make(
            get: function () {
               $totalArea = $this->total_area . ' m2';
               $totalRooms = $this->rooms;

               return $totalArea . ' - ' . $totalRooms . ' ambientes';
            }
        );
    }

    protected function floor(): Attribute
    {
        return Attribute::make(
            get: function (?string $value = null) {
                return $value ?? 'N/A';
            }
        );
    }

    protected function apartmentNumber(): Attribute
    {
        return Attribute::make(
            get: function (?string $value = null) {
                return $value ?? 'N/A';
            }
        );
    }

    protected function expenses(): ?Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($this->propertyType->property_type_id !== 1) {
                    return $value ?? 'N/A';
                }

                return 'N/A';
            }
        );
    }

    protected function isForProfessionalUse(): Attribute
    {
        return Attribute::make(
            get: fn (string $value)  => $value ? 'Sí' : 'No',
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
