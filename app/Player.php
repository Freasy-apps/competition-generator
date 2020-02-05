<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    /**
     * @return BelongsToMany
     */
    public function events(): BelongsToMany
    {
        return self::belongsToMany(Event::class);
    }

    /**
     * @return BelongsToMany
     */
    public function dates(): BelongsToMany
    {
        return self::belongsToMany(Date::class);
    }
}
