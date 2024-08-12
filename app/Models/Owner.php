<?php

namespace App\Models;

use App\Traits\BaseFormattedData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpParser\Node\Attribute;

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
 * @mixin \Eloquent
 */
class Owner extends Model
{
    use HasFactory;
    use BaseFormattedData;

    public function phonePrefix(): BelongsTo
    {
        return $this->belongsTo(
            PhonePrefix::class,
            'phone_prefix_fk_id',
            'phone_prefix_id',
        );
    }
}
