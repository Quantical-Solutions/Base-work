<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Quest of Sallida
use App\Models\Games\QuestOfSallida\Character;
use App\Models\Games\QuestOfSallida\Commande;
use App\Models\Games\QuestOfSallida\Legal;
use App\Models\Games\QuestOfSallida\Player;
use App\Models\Games\QuestOfSallida\Stat;
use App\Models\Games\QuestOfSallida\Team;

class GamesController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index($type)
    {
        $title = 'Jeu non référencé';
        if ($type == 'sallida') {

            $title = 'Quest of Sallida';
            $characters = Character::get()->toArray();
            $commandes = Commande::get()->toArray();
            $legals = Legal::get()->toArray();
            $players = Player::get()->toArray();
            $stats = Stat::get()->toArray();
            $teams = Team::get()->toArray();
            $game = [
                'characters' => $characters,
                'commandes' => $commandes,
                'legals' => $legals,
                'players' => $players,
                'stats' => $stats,
                'teams' => $teams
            ];
        }
        return view('admin/games/scrud', ['title' => $title, 'game' => $game]);
    }

    public function mode($type, $mode, $id = false)
    {
        $title = 'Jeu non référencé';
        if ($type == 'sallida') {

            $title = 'Quest of Sallida';
        }
        return view('admin/tools/edit-read', ['title' => $title]);
    }
}
