<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Drive_shared_path as DrivesPaths;
use App\Models\User;

class DriveController extends Controller
{
    public function __construct()
    {
        $this->middleware('factors');
    }

    public function index()
    {
        $data = $this->getData();
        return view('admin/drives', ['data' => $data]);
    }

    public function postForm(Request $request)
    {
        $data = $this->getData();
        return view('admin/drives', ['data' => $data]);
    }

    private function getData()
    {
        $settings = Setting::select('limit_drive', 'full_drive')->first();
        $space = $this->folderSize(__REALPATH__ . '/public/drive');
        $drive_path = __REALPATH__ . '/public/drive/';
        $users = User::select('id', 'firstname', 'lastname', 'email')->whereIn('role_id', [1,2,3,4])->get()->toArray();
        $drive_dir = scandir($drive_path);
        $admins = $this->getUsers($users);

        return [
            'full' => $settings->full_drive,
            'limit' => $settings->limit_drive,
            'width' => number_format(((100*$space)/($settings->limit_drive*pow(1024, 3))), 2, '.', ' '),
            'used' => $this->size_reader($space),
            'paths' => $this->getDrives($drive_dir, $drive_path)['paths'],
            'admins' => $admins,
            'roots' => $this->getDrives($drive_dir, $drive_path)['roots'],
            'space' => $space,
        ];
    }

    private function folderSize($dir)
    {
        $size = 0;
        foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
            $size += is_file($each) ? filesize($each) : $this->folderSize($each);
        }

        return $size;
    }

    private function size_reader($space)
    {
        if ($space / pow(1024, 4) < 1 && $space / pow(1024, 3) >= 1) {
            $used = number_format(($space / pow(1024, 3)), 1, '.', ' ') . ' Go';
        } else if ($space / pow(1024, 3) < 1 && $space / pow(1024, 2) >= 1) {
            $used = number_format(($space / pow(1024, 2)), 1, '.', ' ') . ' Mo';
        } else if ($space / pow(1024, 2) < 1 && $space / 1024 >= 1) {
            $used = number_format(($space / 1024), 1, '.', ' ') . ' Ko';
        } else if ($space / 1024 < 1 && $space >= 1) {
            $used = number_format($space, 1, '.', ' ') . ' octets';
        } else {
            $used = 'O octets';
        }

        return $used;
    }

    private function getUsers($users)
    {
        $admins = '';
        foreach ($users as $user) {

            $disabled = 'disabled';
            $button = import_svg('edit', 'modify_driver get_bg');
            $admins .= '<li class="admins_inputs" data-email="' . $user['email'] . '"><input ' . $disabled . ' type="radio" name="admins" value="' . str_replace('"', '`', json_encode($user)) . '" onclick="get_admins(this)"><span class="' . $disabled . '" onclick="this.previousElementSibling.click()">' . strtoupper($user['lastname']) . ' ' . ucfirst(strtolower($user['firstname'])) . '</span>' . $button . '</li>';
        }

        return $admins;
    }

    private function getDrives($drive_dir, $drive_path)
    {
        $lis = '';
        $admin_paths = '';

        foreach ($drive_dir as $root => $dir) {

            if ($dir != '.' && $dir != '..') {

                $space_solo = $this->folderSize($drive_path . $dir);
                $used_solo = $this->size_reader($space_solo);
                $path = '/drive/' . $dir;
                $paths = DrivesPaths::select('id')->where('path', $path)->first();

                $lis .= '<li class="directories" data-dir="' . $drive_path . $dir . '">' . import_svg('cats', 'get_fill') . $dir . '<sup>Taille : ' . $used_solo . '</sup></li>';

                $admin_paths .= '<li class="admin_paths_inputs"><div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" value="' . $paths->id . '"><span class="form-check-sign"><span class="check"></span></span></label></div><span onclick="this.previousElementSibling.click()">' . $dir . '</span></li>';
            }
        }

        return ['paths' => $admin_paths, 'roots' => $lis];
    }
}
