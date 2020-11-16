<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api_token as Api;

class ApisController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index()
    {
        $labels = [
            ['custom_name' => 'Image', 'name' => 'img'],
            ['custom_name' => 'Produit', 'name' => 'product'],
            ['custom_name' => 'Société', 'name' => 'entity'],
            ['custom_name' => 'Token', 'name' => 'token'],
            ['custom_name' => 'Unique', 'name' => 'single_site_mode'],
            ['custom_name' => 'Domaine', 'name' => 'site_domain'],
            ['custom_name' => 'Créer le', 'name' => 'created_at']
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

        $results = Api::select('api_tokens.*', 'entities.name as entity', 'products.title_fr as product', 'products.img as img')
            ->join('entities', 'api_tokens.entity_id', '=', 'entities.id')
            ->join('products', 'api_tokens.product_id', '=', 'products.id')
            ->orderBy('id', 'desc')->get()->toArray();
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

                } else if ($name == 'single_site_mode') {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['booleans'], $array);

                } else {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['std'], $array);
                }
            }
        }

        $scrud = scrud($labels, $data, $count);
        return view('admin/tools/scrud', ['title' => 'APIs', 'scrud' => $scrud]);
    }

    public function mode($mode, $id = false)
    {
        return view('admin/tools/edit-read', ['title' => 'API']);
    }
}
