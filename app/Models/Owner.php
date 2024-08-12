<?php

namespace App\Models;

use App\Traits\BaseFormattedData;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $owner_id
 * @property string $name
 * @property string $last_name
 * @property int $dni
 * @property int $cuit
 * @property string $email
 * @property string $address
 * @property int $address_number
 * @property string $city
 * @property string $country
 * @property string $state
 * @property string $neighborhood
 * @property int $postal_code
 * @property int $area_code
 * @property string $phone_number
 * @property string $birth_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $phone_prefix_fk_id
 * @property-read \App\Models\PhonePrefix $phonePrefix
 * @method static \Illuminate\Database\Eloquent\Builder|Owner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereAddressNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereAreaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereCuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner wherePhonePrefixFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereUpdatedAt($value)
 * @property int $zip_code
 * @property-read \App\Models\PhonePrefix $phonePrefixes
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereZipCode($value)
 * @mixin \Eloquent
 */
class Owner extends Model
{
    use BaseFormattedData;

    protected $primaryKey = 'owner_id';

    protected $fillable = [
        'name',
        'last_name',
        'dni',
        'cuit',
        'email',
        'address',
        'address_number',
        'city',
        'country',
        'state',
        'neighborhood',
        'zip_code',
        'phone_number',
        'birth_date',
        'phone_prefix_fk_id',
    ];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: function () {
                return ucwords($this->name . ' ' . $this->last_name);
            },
        );
    }

    protected function fullAddress(): Attribute
    {
        return Attribute::make(
            get: function () {
                return ucwords($this->address . ' ' . $this->address_number . ', ' . $this->neighborhood . ', ' . $this->state);
            },
        );
    }

    protected function FormattedPhoneNumber(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->phonePrefixes->prefix . ' ' .  $this->phone_number;
            },
        );
    }

    public function phonePrefixes(): BelongsTo
    {
        return $this->belongsTo(
            PhonePrefix::class,
            'phone_prefix_fk_id',
            'phone_prefix_id',
        );
    }
}
