<?php

namespace App\Http\Controllers;

use App\Event;
use App\Player;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Collection;

class MerwestadCompetitieController extends Controller
{
    protected $names = [
        'Menno Tempelaar',
        'Desmond Monissen',
        'Theun Evers',
        'Stefan de Jong',
        'Maurice de Jager',
        'Leo Croes',
        'Thijs de Wildt',
        'Thomas',
        'Stefan Bakker',
        'Bert Verschoor',
        'Rob Tempelaar',
        'Ruud Bakker',
        'Lenny Klarenaar',
        'Hans van de Laars',
        'Jaap van Herwijnen',
        'Gerrit Zwang',
        'Gertjan',
        'Sandor'
    ];

    /**
     * @return Collection
     */
    protected function getMerwestadPlayers()
    {
        $players = new Collection();

        foreach ($this->names as $name) {
            $player = new Player();
            $player->name = $name;
            $player->save();

            $players->push($player);
        }

        return $players;
    }


    /**
     * @return RedirectResponse|Redirector
     */
    public function __invoke(Request $request)
    {
        $event = Event::where('name', '=', 'Onderlinge competitie Najaar 2020 - Merwestad');

        if ($event->count() === 0) {
            $event = new Event();
            $event->name = 'Onderlinge competitie Najaar 2020 - Merwestad';
            $event->save();

            $players = $this->getMerwestadPlayers();

            $players->each(function (Player $player) use ($event) {
                $event->players()->attach($player);
            });
        }

        return redirect('/');
    }
}
