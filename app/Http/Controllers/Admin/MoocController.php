<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Mooc
use App\Models\Mooc\Chapter;
use App\Models\Mooc\Classe;
use App\Models\Mooc\Course;
use App\Models\Mooc\Exercice;
use App\Models\Mooc\Forum;
use App\Models\Mooc\Identify;
use App\Models\Mooc\Info;
use App\Models\Mooc\Langage;
use App\Models\Mooc\Resource;
use App\Models\Mooc\Titre;
use App\Models\Mooc\User;
use App\Models\Mooc\UserExercice;

class MoocController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index()
    {
        $mooc = [
            'chapters' => Chapter::get()->toArray(),
            'classes' => Classe::get()->toArray(),
            'courses' => Course::get()->toArray(),
            'exercices' => Exercice::get()->toArray(),
            'forums' => Forum::get()->toArray(),
            'identify' => Identify::get()->toArray(),
            'infos' => Info::get()->toArray(),
            'languages' => Langage::get()->toArray(),
            'resources' => Resource::get()->toArray(),
            'titres' => Titre::get()->toArray(),
            'users' => User::get()->toArray(),
            'user_exo' => UserExercice::get()->toArray()
        ];
        return view('admin/mooc', ['mooc' => $mooc]);
    }
}
