<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $phone_prefix_id
 * @property string $prefix
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PhonePrefix newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhonePrefix newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhonePrefix query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhonePrefix whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhonePrefix whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhonePrefix wherePhonePrefixId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhonePrefix wherePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhonePrefix whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PhonePrefix extends Model
{
    use HasFactory;

    protected $primaryKey = 'phone_prefix_id';

    protected $fillable = [
        'phone_prefix_id',
        'prefix',
        'name',
    ];
}
