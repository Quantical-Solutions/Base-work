<?php

if (!function_exists('import_svg')) {

    function import_svg($file, $class, $array = false)
    {
        $js = '';
        if ($array != false) {
            foreach ($array as $foo) {

                $js .= ' ' . $foo[0] . '="' . $foo[1] . '"';
            }
        }

        $path = dirname(dirname(__DIR__)) . '/public/SVG/' . $file . '.svg';
        if (file_exists($path)) {

            ob_start();
            $inner = str_replace('<svg ', '<svg class="' . explode(' ', $class)[0] . '_svg" ', file_get_contents($path));

            if (strpos($inner, '<title>') !== false && strpos($inner, '</title>') !== false) {

                $final1 = substr($inner, 0, strpos($inner, '<title>'));
                $final2 = substr($inner, strpos($inner, '</title>'), strlen($inner));
                $final = $final1 . $final2;

            } else {

                $final = $inner;
            }

            echo '<div class="' . $class . '"' . $js . '>' . $final . '</div>';
            $svg = ob_get_clean();
            return $svg;
        }
    }
}

if (!function_exists('randomPictures')) {

    function randomPictures($path)
    {
        $dir = dirname(dirname(__DIR__)) . '/public/media/img/' . $path;
        $files = scandir($dir);
        $array_of_pictures = [];
        foreach ($files as $file) {
            if (is_file($dir . '/' . $file) && $file !== '.' && $file !== '..') {
                $explode = explode('.', $file);
                $ext = '.' . end($explode);
                if ($ext == '.png' || $ext == '.jpg' || $ext == '.jpeg') {
                    array_push($array_of_pictures, $file);
                }
            }
        }
        shuffle($array_of_pictures);
        $rand_keys = array_rand($array_of_pictures, 1);
        return '/media/img/' . $path . '/' . $array_of_pictures[$rand_keys];
    }
}

if (!function_exists('preloadPictures')) {

    function preloadPictures($path)
    {
        $dir = dirname(dirname(__DIR__)) . '/public/media/img/' . $path;
        $files = scandir($dir);
        $links = '';
        foreach ($files as $file) {
            if (is_file($dir . '/' . $file) && $file !== '.' && $file !== '..') {
                $explode = explode('.', $file);
                $ext = '.' . end($explode);
                if ($ext == '.png' || $ext == '.jpg' || $ext == '.jpeg') {
                    $links .= '<link rel="preload" as="image" href="/media/img/' . $path . '/' . $file . '"/>' . "\n";
                }
            }
        }

        return $links;
    }
}

if (!function_exists('conjonction')) {

    function conjonction($type, $first_letter)
    {
        $voyelles = ['a','e','i','o','u','y'];
        $conjonction = '';

        if ($type == 'de') {

            $conjonction = (in_array($first_letter, $voyelles)) ? 'd\'' : 'de ';

        } else if ($type == 'que') {

            $conjonction = (in_array($first_letter, $voyelles)) ? 'qu\'' : 'que ';

        }

        if ($conjonction == '') {

            trigger_error('La conjonction ' . $type . 'n\existe pas...');
        }

        return $conjonction;
    }
}

if (!function_exists('compileJsFiles')) {
    
    function compileJsFiles()
    {
        $scripts = '<script  type="text/javascript" src="/js/material/core/popper.min.js"></script>
        <script  type="text/javascript" src="/js/material/core/bootstrap-material-design.min.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/moment.min.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/sweetalert2.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/jquery.validate.min.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/jquery.bootstrap-wizard.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/bootstrap-selectpicker.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/bootstrap-datetimepicker.min.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/jquery.dataTables.min.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/bootstrap-tagsinput.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/jasny-bootstrap.min.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/fullcalendar.min.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/jquery-jvectormap.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/nouislider.min.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/arrive.min.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/chartist.min.js"></script>
        <script  type="text/javascript" src="/js/material/plugins/bootstrap-notify.js"></script>';

        return $scripts;
    }
}

if (!function_exists('geoloc')) {

    function geoloc()
    {
        return 'cooool';
    }
}

if (!function_exists('compileStats')) {

    function compileStats($type, $year)
    {
        return json_encode([]);
    }
}

if (!function_exists('isMyRoute')) {

    function isMyRoute($needle)
    {
        $segment = explode('/', $_SERVER['REQUEST_URI'])[1];
        if ($segment == 'utilisateurs' || $segment == 'games' || $segment == 'societes') {
            $all = explode('/', $_SERVER['REQUEST_URI'])[1] . '/' . explode('/', $_SERVER['REQUEST_URI'])[2];
            return $all == $needle;
        }
        return $segment == $needle;
    }
}