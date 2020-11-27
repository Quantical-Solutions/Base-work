<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calendar;
use Carbon\Carbon;
use App\Models\Entity;
use App\Models\User;
use Auth;

class CalendarsController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index()
    {
        $emails = $this->getEmails();
        $calendars = [
            'clients' => Calendar::where('calendar_type', 1)->get()->toArray(),
            'formations' => Calendar::where('calendar_type', 2)->get()->toArray(),
            'interventions' => Calendar::where('calendar_type', 3)->get()->toArray()
        ];
        
        return view('admin/calendars', ['calendars' => $calendars, 'carbon' => Carbon::class, 'emails' => $emails]);
    }

    private function getEmails()
    {
        $emails = [];

        $entities = Entity::select('entities.email', 'entities.name', 'roles.name AS role')
            ->join('roles', 'entities.role_id', '=', 'roles.id')
            ->get()->toArray();

        foreach ($entities as $entity) {

            $name = (strpos($entity['name'], '/') === false) ? explode(' ', $entity['name']) : explode('/', $entity['name']);
            $name = (isset($name[1])) ? substr(trim($name[0]), 0, 1) . substr(trim($name[1]), 0, 1) : substr(trim($entity['name']), 0, 1);
            $array = [
                'avatar' => ($entity['name'] != 'Quantical Solutions')
                    ? '<div class="preview-email-avatar bg-cal">' . $name . '</div>'
                    : '<div class="preview-email-avatar bg-black" style="background-image: url(\'/media/img/logo-QS.png\')"></div>',
                'email' => $entity['email'],
                'name' => ($entity['name'] != 'Quantical Solutions') ? 'Société' : $entity['role']
            ];
            array_push($emails, $array);
        }

        $users = User::select('users.avatar', 'users.firstname', 'users.lastname', 'users.email', 'roles.name AS role')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->get()->toArray();

        foreach ($users as $user) {

            $array = [
                'avatar' => (!file_exists(constant('__REALPATH__') . '/users/' . $user['avatar']))
                    ? '<div class="preview-email-avatar bg-cal">' . substr($user['firstname'], 0, 1) . substr($user['lastname'], 0, 1) . '</div>'
                    : '<div class="preview-email-avatar bg-cal bg-black" style="background-image: url(\"/users/' . $user['avatar'] . '\")"></div>',
                'email' => $user['email'],
                'name' => ($user['email'] == Auth::user()->email) ? 'Organisateur' : $user['role']
            ];
            array_push($emails, $array);
        }

        return $emails;
    }
}
