<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
//Models
use App\Models\Article;
use App\Models\Api_token as Api;
use App\Models\Category;
use App\Models\Drive_relation as DriveRelation;
use App\Models\Email;
use App\Models\EmailModel;
use App\Models\Entity;
use App\Models\Event;
use App\Models\Ip;
use App\Models\Learning;
use App\Models\Newsletter;
use App\Models\Newsletter_email as NewsletterEmail;
use App\Models\Page;
use App\Models\Product;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;

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

        if ($url == 'articles' || $url == 'presse') {

            $results = Article::select('title_fr')->where('id', $id)->first();
            $title .= $results->title_fr;
            Article::where('id', $id)->delete();

        } else if ($url == 'pages') {

            $results = Page::select('title_fr')->where('id', $id)->first();
            $title .= $results->title_fr;
            Page::where('id', $id)->delete();

        } else if ($url == 'categories') {

            $results = Category::select('name')->where('id', $id)->first();
            $title .= $results->name;
            Article::where('category_id', $id)->update(['category_id', null]);
            Category::where('id', $id)->delete();

        } else if ($url == 'newsletters') {

            $results = Newsletter::select('title_fr')->where('id', $id)->first();
            $title .= $results->title_fr;
            Newsletter::where('id', $id)->delete();

        } else if ($url == 'utilisateurs/gestion' || $url == 'utilisateurs/apprenants') {

            $results = User::select('name')->where('id', $id)->first();
            $title .= $results->name;
            User::where('id', $id)->delete();
            DriveRelation::where('user_id', $id)->delete();

        } else if ($url == 'events') {

            $results = Event::select('title_fr')->where('id', $id)->first();
            $title .= $results->title_fr;
            Event::where('id', $id)->delete();

        } else if ($url == 'societes/clients' || $url == 'societes/fournisseurs') {

            $results = Entity::select('name')->where('id', $id)->first();
            $title .= $results->name;
            Entity::where('id', $id)->delete();
            Api::where('entity_id', $id)->delete();
            Email::where('entity_id', $id)->delete();
            Newsletter::where('entity_id', $id)->delete();
            NewsletterEmail::where('entity_id', $id)->delete();
            Article::where('entity_id', $id)->update(['entity_id', null]);

        } else if ($url == 'produits') {

            $results = Product::select('title_fr')->where('id', $id)->first();
            $title .= $results->title_fr;
            Product::where('id', $id)->delete();
            Api::where('product_id', $id)->delete();

        } else if ($url == 'formations') {

            $results = Learning::select('title_fr')->where('id', $id)->first();
            $title .= $results->title_fr;
            Learning::where('id', $id)->delete();

        } else if ($url == 'apis') {

            $results = Api::select('api_tokens.token', 'products.title_fr as product')->join('products', 'api_tokens.id', '=', 'products.id')->where('api_tokens.id', $id)->first();
            $title .= 'Le token ' . $results->token . ' du produit ' . $results->product;
            Api::where('id', $id)->delete();

        } else if ($url == 'ips') {

            $results = Ip::select('ip_address')->where('id', $id)->first();
            $title .= 'L\' adresse IP' . $results->ip_address;
            Ip::where('id', $id)->delete();

        }

        return ['id' => $id, 'url' => $url, 'title' => $title];
    }

    public function get_visio($request)
    {
        $visio = config('app.visio');
        return ['visio' => $visio . '/jsg6tGR54d4Thh'];
    }
}
