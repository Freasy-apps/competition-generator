<?php

namespace App\Http\Controllers;

use App\Date;
use App\Event;
use App\Player;
use Faker\Generator as Faker;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    public function __invoke(Request $request)
    {
        $event = factory(Event::class)->create();
        $players = factory(Player::class, 20)->create();
        $dates = factory(Date::class, 3)->create([
            'event_id' => $event->id
        ]);

        $players->each(function (Player $player) use ($event) {
            $event->players()->attach($player);
        });

        $dates->each(function (Date $date) use ($event) {
            $full = $this->faker->boolean(75);

            if ($full) {
                $datePlayers = $event->players;
            } else {
                $datePlayers = $event->players->random(rand(15, 20));
            }

            $datePlayers->each(function (Player $player) use ($date) {
                $date->players()->attach($player);
            });
        });

        $event->load(['players', 'dates']);

        return response()->json([
            'dates' => $event->dates->load(['players']),
            'event' => $event
        ]);
    }
}
