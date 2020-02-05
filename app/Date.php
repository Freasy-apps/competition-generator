<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Date
 *
 * @package App
 *
 * @property Event $event
 */
class Date extends Model
{
    /**
     * @return BelongsTo
     */
    public function event(): BelongsTo
    {
        return self::belongsTo(Event::class);
    }

    /**
     * @return BelongsToMany
     */
    public function players(): BelongsToMany
    {
        return self::belongsToMany(Player::class);
    }
}
