<?php

namespace App\Casts;

use App\ValueObjects\UserId as UserIdValueObject;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class UserId implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return new UserIdValueObject($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if (!($value instanceof UserIdValueObject)) {
            throw new InvalidArgumentException('The given value is not an instance of UserIdValueObject.');
        }

        return [
            'userId' => $value->toString()
        ];
    }
}
