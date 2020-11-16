<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index()
    {
        $labels = [
            ['custom_name' => 'URI', 'name' => 'uri_fr'],
            ['custom_name' => 'Titre', 'name' => 'title_fr'],
            ['custom_name' => 'Contenu', 'name' => 'content_fr'],
            ['custom_name' => 'Méta image', 'name' => 'meta_img'],
            ['custom_name' => 'Date de création', 'name' => 'created_at'],
        ];

        $data = [
            'videos' => [],
            'images' => [],
            'sounds' => [],
            'booleans' => [],
            'json' => [],
            'date' => [],
            'std' => [],
        ];

        $results = Page::select('*')->orderBy('id', 'desc')->get()->toArray();
        $count = count($results);

        foreach ($results as $index => $result) {

            $id = $result['id'];

            foreach ($result as $name => $row) {

                if (strpos($name, 'content') !== false) {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['json'], $array);

                } else if (strpos($name, '_img') !== false) {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['images'], $array);

                } else if ($name == 'created_at') {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['date'], $array);

                } else {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['std'], $array);
                }
            }
        }

        $scrud = scrud($labels, $data, $count);
        return view('admin/tools/scrud', ['title' => 'Pages & Contenus', 'scrud' => $scrud]);
    }

    public function mode($mode, $id = false)
    {
        return view('admin/tools/edit-read', ['title' => 'Page & Contenu']);
    }
}
