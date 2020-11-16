<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class PresseController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index()
    {
        $labels = [
            ['custom_name' => 'Titre', 'name' => 'title_fr'],
            ['custom_name' => 'Publié', 'name' => 'published'],
            ['custom_name' => 'Catégorie', 'name' => 'category'],
            ['custom_name' => 'Contenu', 'name' => 'content_fr'],
            ['custom_name' => 'Image', 'name' => 'img_1'],
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

        $results = Article::select('articles.id', 'articles.title_fr', 'articles.published', 'articles.img_1', 'articles.content_fr', 'articles.created_at', 'categories.name AS category')->join('categories', 'articles.category_id', '=', 'categories.id')->where('articles.category_id', 3)->orderBy('id', 'desc')->get()->toArray();
        $count = count($results);

        foreach ($results as $index => $result) {

            $id = $result['id'];

            foreach ($result as $name => $row) {

                if ($name == 'published') {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['booleans'], $array);

                } else if (strpos($name, 'content') !== false) {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['json'], $array);

                } else if (strpos($name, 'img_') !== false) {

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
        return view('admin/tools/scrud', ['title' => 'Presse', 'scrud' => $scrud]);
    }

    public function mode($mode, $id = false)
    {
        return view('admin/tools/edit-read', ['title' => 'Presse']);
    }
}
