<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index($type)
    {
        $title = '';
        if ($type == 'gestion') {
            $title = 'Utilisateurs';

            $results = User::select('users.*', 'roles.name AS role', 'entities.name AS entity')
                ->join('roles', 'users.role_id', '=', 'roles.id')
                ->join('entities', 'users.entity_id', '=', 'entities.id')
                ->whereIn('users.role_id', [1,2,3,4])
                ->orderBy('id', 'desc')->get()->toArray();

        } else if ($type == 'apprenants') {
            $title = 'Apprenants';

            $results = User::select('users.*', 'roles.name AS role', 'entities.name AS entity')
                ->join('roles', 'users.role_id', '=', 'roles.id')
                ->join('entities', 'users.entity_id', '=', 'entities.id')
                ->where('users.role_id', 6)
                ->orderBy('id', 'desc')->get()->toArray();
        }
        $labels = [
            ['custom_name' => 'Avatar', 'name' => 'avatar'],
            ['custom_name' => 'Prénom Nom', 'name' => 'name'],
            ['custom_name' => 'Rôle', 'name' => 'role'],
            ['custom_name' => 'Email', 'name' => 'email'],
            ['custom_name' => 'Société', 'name' => 'entity'],
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

        $count = count($results);

        foreach ($results as $index => $result) {

            $id = $result['id'];

            foreach ($result as $name => $row) {

                if ($name == 'avatar') {

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
        return view('admin/tools/scrud', ['title' => $title, 'scrud' => $scrud]);
    }

    public function mode($type, $mode, $id = false)
    {
        $title = '';
        if ($type == 'gestion') {
            $title = 'Utilisateur';
        } else if ($type == 'apprenants') {
            $title = 'Apprenant';
        }
        return view('admin/tools/edit-read', ['title' => $title]);
    }
}
