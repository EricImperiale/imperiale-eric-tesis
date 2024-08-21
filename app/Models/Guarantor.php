<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 * @mixin \Eloquent
 */
class Guarantor extends Model
{
    use HasFactory;

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

    public function phonePrefixes(): BelongsTo
    {
        return $this->belongsTo(
            PhonePrefix::class,
            'phone_prefix_fk_id',
            'phone_prefix_id',
        );
    }
}
