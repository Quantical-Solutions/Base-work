<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index()
    {
        $labels = [
            ['custom_name' => 'Image', 'name' => 'img'],
            ['custom_name' => 'Date', 'name' => 'event_date'],
            ['custom_name' => 'Départ', 'name' => 'event_start'],
            ['custom_name' => 'Titre', 'name' => 'title_fr'],
            ['custom_name' => 'Ville', 'name' => 'city']
        ];

        $data = [
            'videos' => [],
            'images' => [],
            'sounds' => [],
            'booleans' => [],
            'json' => [],
            'date' => [],
            'time' => [],
            'std' => [],
        ];

        $results = Event::select('*')->orderBy('id', 'desc')->get()->toArray();
        $count = count($results);

        foreach ($results as $index => $result) {

            $id = $result['id'];

            foreach ($result as $name => $row) {

                if ($name == 'img') {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['images'], $array);

                } else if ($name == 'event_date') {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['date'], $array);

                } else if ($name == 'event_start') {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['time'], $array);

                } else {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['std'], $array);
                }
            }
        }

        $scrud = scrud($labels, $data, $count);
        return view('admin/tools/scrud', ['title' => '&Eacute;vènements', 'scrud' => $scrud]);
    }

    public function mode($mode, $id = false)
    {
        return view('admin/tools/edit-read', ['title' => '&Eacute;vènement']);
    }
}
