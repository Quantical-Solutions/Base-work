<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Article;

class XhrController extends Controller
{
    public function index($controller, Request $request)
    {
        if (request()->ajax()) {

            $cont = 'get_' . strtolower($controller);

            if (method_exists($this, $cont)) {

                echo json_encode([
                    'data' => $this->$cont($request),
                    'error' => '',
                    'params' => $controller,
                    'callback' => 'get' . ucfirst(strtolower($controller)) . 'Response'
                ]);

            } else {

                echo json_encode([
                    'data' => [],
                    'error' => 'Your request can\'t be treated.',
                    'params' => $controller,
                    'callback' => ''
                ]);
            }

        } else {

            abort(404);
        }
    }

    private function get_users($request)
    {
        return ['test' => array('tapaj1', 'tapaj2')];
    }

    private function get_calendar($request)
    {
        $array = ['calendar' => $request->input('type')];
        return $array;
    }

    private function get_charts($request)
    {
        $query = $request->input('request');
        $text = $request->input('requestText');
        $start = $request->input('start');
        $end = $request->input('end');
        $user = $request->input('user');
        $silo = $request->input('silo');
        $file_name = $request->input('fileName');

        $response = requestsProvider($silo, $query, $start, $end);

        return ($response['error'] == 'none')
            ? ['charts' => ['user' => $user, 'request' => $text, 'file_name' => $file_name, 'data' => $response['data']]]
            : ['charts' => ['error' => $response['error']]];
    }

    private function get_plateaux($request)
    {
        $id = $request->input('id');
        $date = $request->input('date');
        $array = [];

        if ($date == '2020-11-02' || $date == '2020-11-04' || $date == '2020-11-05') {

            $array = [
                [
                    'id' => 1,
                    'date' => $this->dateTitle($date),
                    'start_time' => '09:00',
                    'end_time' => '17:00',
                    'title' => 'Contrat Bordeaux',
                    'nature' => 'Nettoyage',
                    'partenaire' => 'AUCHAN',
                    'tapajeurs' => [
                        [
                            'firstname' => 'Forbon',
                            'lastname' => 'Patrick',
                            'id' => 1
                        ],
                        [
                            'firstname' => 'Malou',
                            'lastname' => 'Christelle',
                            'id' => 2
                        ],
                        [
                            'firstname' => 'Villefranche',
                            'lastname' => 'Christophe',
                            'id' => 3
                        ],
                        [
                            'firstname' => 'Forbon',
                            'lastname' => 'Patrick',
                            'id' => 4
                        ],
                        [
                            'firstname' => 'Malou',
                            'lastname' => 'Christelle',
                            'id' => 5
                        ],
                        [
                            'firstname' => 'Villefranche',
                            'lastname' => 'Christophe',
                            'id' => 6
                        ]
                    ]
                ],
                [
                    'id' => 2,
                    'date' => $this->dateTitle($date),
                    'start_time' => '13:00',
                    'end_time' => '18:00',
                    'title' => 'Contrat Mérignac',
                    'nature' => 'Espaces verts',
                    'partenaire' => 'LECLERC',
                    'tapajeurs' => [
                        [
                            'firstname' => 'Forbon',
                            'lastname' => 'Patrick',
                            'id' => 1
                        ],
                        [
                            'firstname' => 'Malou',
                            'lastname' => 'Christelle',
                            'id' => 2
                        ],
                        [
                            'firstname' => 'Villefranche',
                            'lastname' => 'Christophe',
                            'id' => 3
                        ],
                        [
                            'firstname' => 'Forbon',
                            'lastname' => 'Patrick',
                            'id' => 4
                        ],
                        [
                            'firstname' => 'Malou',
                            'lastname' => 'Christelle',
                            'id' => 5
                        ],
                        [
                            'firstname' => 'Villefranche',
                            'lastname' => 'Christophe',
                            'id' => 6
                        ]
                    ]
                ]
            ];
        }
        return $array;
    }

    private function dateTitle($date)
    {
        $d = Carbon::parse($date);
        $final = ucfirst($d->locale('fr')->isoFormat('dddd')) . '<br>' . ucfirst($d->locale('fr')->isoFormat('Do MMMM'));
        return $final;
    }

    public function get_delete($request)
    {
        $id = $request->input('id');
        $url = $request->input('url');
        $title = '';
        switch ($url) {

            case 'articles':
                $article = Article::select('title_fr')->where('id', $id)->first();
                $title .= $article->title_fr;
                Article::where('id', $id)->delete();
                break;

            default:


        }
        return ['id' => $id, 'url' => $url, 'title' => $title];
    }
}
