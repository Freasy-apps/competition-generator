<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    /**
     * @return BelongsToMany
     */
    public function players(): BelongsToMany
    {
        return self::belongsToMany(Player::class);
    }

    /**
     * @return HasMany
     */
    public function dates(): HasMany
    {
        return self::hasMany(Date::class);
    }
}
