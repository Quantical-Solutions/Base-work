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
use Illuminate\Support\Facades\DB;

class MoocController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index()
    {
        $mooc = $this->getData();
        $mooc['fileLoaded'] = '';
        return view('admin/mooc', $mooc);
    }

    public function getPost(Request $request)
    {
        $mooc = $this->getData();
        $mooc['fileLoaded'] = '';
        if ($request->input('moocController') != null && !empty($request->input('moocController'))) {

            $mooc['fileLoaded'] = $this->recordMooc()[1];
        }
        return view('admin/mooc', $mooc);
    }

    private function getData()
    {
        $actualYear = intval(date("Y")) + 1;
        $olderYear = 2010;
        $optionsYears = '';

        while ($actualYear >= $olderYear) {
            $optionsYears .= '<option value="' . $actualYear . '">' . $actualYear . '</option>';
            $actualYear--;
        }

        $rowCounter = Info::select('id')->get()->count();

        return [
            'identify' => $this->get_mooc('identify'),
            'classes' => $this->get_mooc('classes'),
            'users' => $this->get_mooc('users'),
            'schools' => $this->get_mooc('schools'),
            'sources' => $this->get_mooc('ressources'),
            'courses' => $this->get_mooc('courses'),
            'infos' => $this->get_mooc('infos'),
            'cats' => $this->get_mooc('langages'),
            'titres' => $this->get_mooc('titres'),
            'rowCounter' => $rowCounter,
            'infosMode' => ($rowCounter > 0) ? 'modify' : 'record',
            'optionsYears' => $optionsYears
        ];
    }

    private function get_mooc($table)
    {
        $results = [];
        switch ($table) {

            case 'identify':
                $results = Identify::where('id', 1)->first()->toArray();
                break;

            case 'classes':
                $results = DB::connection('mysql3')->select('select `mooc_classes`.`id`, `mooc_classes`.`name`,`mooc_classes`.`school_id`,`mooc_classes`.`titre_id`,`mooc_classes`.`start_year`,`mooc_classes`.`end_year`,`mooc_classes`.`graduate`, `mooc_ressources`.`title`, `mooc_titres`.`name` as titre from mooc_classes inner join mooc_ressources on `mooc_classes`.`school_id` = `mooc_ressources`.`id` inner join mooc_titres on `mooc_classes`.`titre_id` = `mooc_titres`.`id`');
                break;

            case 'users':
                $results = User::get()->toArray();
                break;

            case 'schools':
                $results = Resource::where('type', 0)->get()->toArray();
                break;

            case 'ressources':
                $results = Resource::get()->toArray();
                break;

            case 'courses':
                $results = Course::get()->toArray();
                break;

            case 'infos':
                $results = Info::where('id', 1)->first()->toArray();
                break;

            case 'langages':
                $results = Langage::get()->toArray();
                break;

            case 'titres':
                $results = Titre::get()->toArray();
                break;
        }

        return $results;
    }

    private function recordMooc()
    {
        return [];
    }
}
