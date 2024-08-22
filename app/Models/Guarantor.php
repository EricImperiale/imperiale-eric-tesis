<?php

namespace App\Models;

use App\Traits\BaseFormattedData;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * 
 *
 * @property int $id
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
 * @property int $zip_code
 * @property int $phone_number
 * @property string $birth_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $phone_prefix_fk_id
 * @property-read \App\Models\PhonePrefix $phonePrefixes
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereAddressNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereCuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor wherePhonePrefixFkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereZipCode($value)
 * @property-read mixed $formatted_phone_number
 * @property-read mixed $full_address
 * @property-read mixed $full_name
 * @mixin \Eloquent
 */
class Guarantor extends Model
{
    use HasFactory;
    use AuthorizesRequests;

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

    protected function formattedPhoneNumber(): Attribute
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
