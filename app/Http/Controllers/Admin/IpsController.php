<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ip;

class IpsController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index()
    {
        $labels = [
            ['custom_name' => 'Adresse IP', 'name' => 'ip_address'],
            ['custom_name' => 'Tentatives', 'name' => 'attempts'],
            ['custom_name' => 'Pays', 'name' => 'country'],
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

        $results = Ip::select('*')->orderBy('id', 'desc')->get()->toArray();
        $count = count($results);

        foreach ($results as $index => $result) {

            $id = $result['id'];

            foreach ($result as $name => $row) {

                if ($name == 'created_at') {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['date'], $array);

                } else {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['std'], $array);
                }
            }
        }

        $scrud = scrud($labels, $data, $count);
        return view('admin/tools/scrud', ['title' => 'IP Bannies', 'scrud' => $scrud]);
    }
}
