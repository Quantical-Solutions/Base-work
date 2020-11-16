<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entity;

class EntitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index($type)
    {
        $title = '';
        if ($type == 'clients') {
            $title = 'Clients';
            $results = Entity::select('entities.*', 'roles.name AS role')
                ->join('roles', 'entities.role_id', '=', 'roles.id')
                ->where('roles.name', 'Client')
                ->orderBy('id', 'desc')->get()->toArray();
        } else if ($type == 'fournisseurs') {
            $title = 'Fournisseurs';
            $results = Entity::select('entities.*', 'roles.name AS role')
                ->join('roles', 'entities.role_id', '=', 'roles.id')
                ->where('roles.name', 'Fournisseur')
                ->orderBy('id', 'desc')->get()->toArray();
        }
        $labels = [
            ['custom_name' => 'Rôle', 'name' => 'role'],
            ['custom_name' => 'QS', 'name' => 'qs_entity'],
            ['custom_name' => 'Nom', 'name' => 'name'],
            ['custom_name' => 'Email', 'name' => 'email'],
            ['custom_name' => 'Ville', 'name' => 'city'],
            ['custom_name' => 'Pays', 'name' => 'country']
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

        $count = count($results);

        foreach ($results as $index => $result) {

            $id = $result['id'];

            foreach ($result as $name => $row) {

                if ($name == 'qs_entity') {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['booleans'], $array);

                } else {

                    $array = ['id' => $id, 'key' => $index, 'col_name' => $name, 'row' => $row];
                    array_push($data['std'], $array);
                }
            }
        }

        $scrud = scrud($labels, $data, $count);
        return view('admin/tools/scrud', ['title' => $title, 'scrud' => $scrud]);
    }

    public function mode($type, $mode, $id = false)
    {
        $title = '';
        if ($type == 'clients') {
            $title = 'Client';
        } else if ($type == 'fournisseurs') {
            $title = 'Fournisseur';
        }
        return view('admin/tools/edit-read', ['title' => $title]);
    }
}
