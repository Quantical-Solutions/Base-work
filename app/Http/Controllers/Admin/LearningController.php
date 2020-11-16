<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Learning;

class LearningController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index()
    {
        $labels = [
            ['custom_name' => 'Image', 'name' => 'img'],
            ['custom_name' => 'Titre', 'name' => 'title_fr'],
            ['custom_name' => 'Description', 'name' => 'content_fr'],
            ['custom_name' => 'Date', 'name' => 'created_at']
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

        $results = Learning::select('*')->orderBy('id', 'desc')->get()->toArray();
        $count = count($results);

        foreach ($results as $index => $result) {

            $id = $result['id'];

            foreach ($result as $name => $row) {

                if ($name == 'img') {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['images'], $array);

                } else if ($name == 'created_at') {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['date'], $array);

                } else if (strpos($name, 'content_') !== false) {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['json'], $array);

                } else {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['std'], $array);
                }
            }
        }

        $scrud = scrud($labels, $data, $count);
        return view('admin/tools/scrud', ['title' => 'Formations', 'scrud' => $scrud]);
    }

    public function mode($mode, $id = false)
    {
        return view('admin/tools/edit-read', ['title' => 'Formation']);
    }
}
