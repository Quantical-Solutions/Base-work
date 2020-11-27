<?php

use Carbon\Carbon;

if (!function_exists('scrud')) {

    /**
     * Scrud function can build a Database Table SCRUD
     *
     * Arrays models :
     *
     * $labels = [
     *      ['custom_name' => 'My id Custom Name', 'name' => 'id'],
     *      ['custom_name' => 'My title Custom Name', 'name' => 'title'],
     *      ['custom_name' => 'My date Custom Name', 'name' => 'date'],
     *      ...
     * ];
     *
     * $data = [
     *      'videos' => [
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ...
     *       ],
     *      'images' => [
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ...
     *       ],
     *      'sounds' => [
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ...
     *       ],
     *      'booleans' => [
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ...
     *       ],
     *      'json' => [
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ...
     *       ],
     *      'date' => [
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ...
     *       ],
     *      'time' => [
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ...
     *       ],
     *      'std' => [
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ['id' => $id, 'key' => $index, 'col_name' => 'db column name', 'row' => 'db result'],
     *          ...
     *       ],
     * ];
     *
     * @param $labels
     * @param $data
     * @param $count
     * @return string
     */
    
    function scrud($labels, $data, $count)
    {
        $videos = (isset($data['videos']) && !empty($data['videos'])) ? $data['videos'] : [];
        $images = (isset($data['images']) && !empty($data['images'])) ? $data['images'] : [];
        $sounds = (isset($data['sounds']) && !empty($data['sounds'])) ? $data['sounds'] : [];
        $booleans = (isset($data['booleans']) && !empty($data['booleans'])) ? $data['booleans'] : [];
        $jsons = (isset($data['json']) && !empty($data['json'])) ? $data['json'] : [];
        $dates = (isset($data['date']) && !empty($data['date'])) ? $data['date'] : [];
        $times = (isset($data['time']) && !empty($data['time'])) ? $data['time'] : [];
        $stds = (isset($data['std']) && !empty($data['std'])) ? $data['std'] : [];
        $labelsOrder = [];

        $tHead = '<div class="card scrudCard" data-count="' . $count . '"><div class="card-header card-header-primary"><div class="card-category"><div class="card-category-buttons"><a href="' . $_SERVER['REQUEST_URI'] . '/new">' . import_svg('plus', 'addRow') . '&nbsp;Ajouter une entrée</a><a href="/download' . $_SERVER['REQUEST_URI'] . '/print" download="Impression du rapport des ' . ucfirst(substr($_SERVER['REQUEST_URI'], 1)) . ' au ' . date("d-m-Y") . ' à ' . date("H\hi") . '">' . import_svg('download', 'printDiv') . '&nbsp; Imprimer le rapport</a><a href="/download' . $_SERVER['REQUEST_URI'] . '/export" download="Export du rapport des ' . ucfirst(substr($_SERVER['REQUEST_URI'], 1)) . ' au ' . date("d-m-Y") . ' à ' . date("H\hi") . '">' . import_svg('printer', 'printDiv') . '&nbsp;Exporter le rapport</a></div></div></div><div class="card-body"><div class="table-responsive">';

        $tHead .= '<table class="table"><thead class="text-primary"><tr>';
        $tHead .= '';
        foreach ($labels as $label) {
            $custom = $label['custom_name'];
            $dbName = $label['name'];
            $tHead .= '<th id="' . $dbName . '"><div class="thContainer">';
            $tHead .= '<span class="thSpans">' . $custom . '</span>';
            $tHead .= '<div class="thSearch"><input data-col="' . $dbName . '" placeholder="' . ucfirst($custom) . '..." type="text" autocomplete="off" spellcheck="false">';
            $tHead .= import_svg('loupe', 'searchScrud');
            $tHead .= '</div>';
            $tHead .= '</div></th>';
            array_push($labelsOrder, $dbName);
        }

        $tHead .= '<th class="thAction"><div class="thContainer"><span class="thSpans">Action</span></div></th></tr></thead>';
        $tBody = '<tbody>';
        $collect = [];

        foreach ($videos as $video) {
            $array = scrudVideos($video);
            if (!isset($collect[$array['key']])) {
                $collect[$array['key']] = [];
            }
            array_push($collect[$array['key']], ['id' => $array['id'], 'col' => $array['col'], 'html' => $array['html']]);
        }

        foreach ($images as $image) {
            $array = scrudImages($image);
            if (!isset($collect[$array['key']])) {
                $collect[$array['key']] = [];
            }
            array_push($collect[$array['key']], ['id' => $array['id'], 'col' => $array['col'], 'html' => $array['html']]);
        }

        foreach ($sounds as $sound) {
            $array = scrudSounds($sound);
            if (!isset($collect[$array['key']])) {
                $collect[$array['key']] = [];
            }
            array_push($collect[$array['key']], ['id' => $array['id'], 'col' => $array['col'], 'html' => $array['html']]);
        }

        foreach ($booleans as $boolean) {
            $array = scrudBooleans($boolean);
            if (!isset($collect[$array['key']])) {
                $collect[$array['key']] = [];
            }
            array_push($collect[$array['key']], ['id' => $array['id'], 'col' => $array['col'], 'html' => $array['html']]);
        }

        foreach ($jsons as $json) {
            $array = scrudJson($json);
            if (!isset($collect[$array['key']])) {
                $collect[$array['key']] = [];
            }
            array_push($collect[$array['key']], ['id' => $array['id'], 'col' => $array['col'], 'html' => $array['html']]);
        }

        foreach ($dates as $date) {
            $array = scrudDate($date);
            if (!isset($collect[$array['key']])) {
                $collect[$array['key']] = [];
            }
            array_push($collect[$array['key']], ['id' => $array['id'], 'col' => $array['col'], 'html' => $array['html']]);
        }

        foreach ($times as $time) {
            $array = scrudTime($time);
            if (!isset($collect[$array['key']])) {
                $collect[$array['key']] = [];
            }
            array_push($collect[$array['key']], ['id' => $array['id'], 'col' => $array['col'], 'html' => $array['html']]);
        }

        foreach ($stds as $std) {
            $array = scrudStd($std);
            if (!isset($collect[$array['key']])) {
                $collect[$array['key']] = [];
            }
            array_push($collect[$array['key']], ['id' => $array['id'], 'col' => $array['col'], 'html' => $array['html']]);
        }

        $tBody .= rowsBuilder($collect, $labels);

        $tBody .= '</tbody>';
        $body = ($tBody == '<tbody></tbody>')
            ? '</table></div></div><p class="noScrud">Pas de résultat pour le moment, veuillez créer un enregistrement.</p>'
            : $tBody . '</table></div>';

        return $tHead . $body;
    }
}

if (!function_exists('scrudVideos')) {

    function scrudVideos($data)
    {
        $final = [];
        $html = '<td class="tdVideos td-' . $data['col_name'] . '">';
        $html .= (file_exists(constant('__REALPATH__') . '/public/media/video/' . $data['row']))
            ? '<span class="mediaSearch" style="display: none;">' . $data['row'] . '</span><span><img src="/media/video/' . $data['row'] . '"></span>'
            : '<span class="mediaSearch" style="display: none;">' . $data['row'] . '</span><p>Pas de vidéo sous le nom "' . $data['row'] . '"</p>';
        $html .= '</td>';
        $final['id'] = $data['id'];
        $final['key'] = $data['key'];
        $final['col'] = $data['col_name'];
        $final['html'] = $html;
        return $final;
    }
}

if (!function_exists('scrudImages')) {

    function scrudImages($data)
    {
        $final = [];
        $html = '<td class="tdImages td-' . $data['col_name'] . '">';
        $html .= (file_exists(constant('__REALPATH__') . '/public/media/img/' . $data['row']))
            ? '<span class="mediaSearch" style="display: none;">' . $data['row'] . '</span><span><img src="/media/img/' . $data['row'] . '"></span>'
            : '<span class="mediaSearch" style="display: none;">' . $data['row'] . '</span><p>Pas d\'image sous le nom "' . $data['row'] . '"</p>';
        $html .= '</td>';
        $final['id'] = $data['id'];
        $final['key'] = $data['key'];
        $final['col'] = $data['col_name'];
        $final['html'] = $html;
        return $final;
    }
}

if (!function_exists('scrudSounds')) {

    function scrudSounds($data)
    {
        $final = [];
        $html = '<td class="tdSounds td-' . $data['col_name'] . '">';
        $html .= (file_exists(constant('__REALPATH__') . '/public/media/sound/' . $data['row']))
            ? '<span class="mediaSearch" style="display: none;">' . $data['row'] . '</span><span><img src="/media/sound/' . $data['row'] . '"></span>'
            : '<span class="mediaSearch" style="display: none;">' . $data['row'] . '</span><p>Pas de bande son sous le nom "' . $data['row'] . '"</p>';
        $html .= '</td>';
        $final['id'] = $data['id'];
        $final['key'] = $data['key'];
        $final['col'] = $data['col_name'];
        $final['html'] = $html;
        return $final;
    }
}

if (!function_exists('scrudBooleans')) {

    function scrudBooleans($data)
    {
        $final = [];
        $html = '<td class="tdBooleans td-' . $data['col_name'] . '"><span class="boolSearch" style="display: none;">' . (($data['row'] == 1) ? 'Oui' : 'Non') . '</span>';
        $html .= ($data['row'] == 1) ? import_svg('ok', 'scrudBoolOk') : import_svg('nok', 'scrudBoolNok');
        $html .= '</td>';
        $final['id'] = $data['id'];
        $final['key'] = $data['key'];
        $final['col'] = $data['col_name'];
        $final['html'] = $html;
        return $final;
    }
}

if (!function_exists('scrudJson')) {

    function scrudJson($data)
    {
        $final = [];
        $count = '<span class="jsonCounter">' . count(json_decode($data['row'])) . '</span>';
        $html = '<td class="tdJson td-' . $data['col_name'] . '">' . $count . '<span class="jsonSearch" style="display: none;">' . htmlspecialchars($data['row']) . '</span>';
        $implode = substr(implode('<br>', json_decode($data['row'])), 0, 50);
        $html .= (strpos($implode, '</p>') !== false)
            ? explode('</p>', $implode)[0] . '...</p>'
            : $implode . '...</p>';
        $html .= '</td>';
        $final['id'] = $data['id'];
        $final['key'] = $data['key'];
        $final['col'] = $data['col_name'];
        $final['html'] = $html;
        return $final;
    }
}

if (!function_exists('scrudDate')) {

    function scrudDate($data)
    {
        $final = [];
        $html = '<td class="tdDate td-' . $data['col_name'] . '"><span class="dateSearch" style="display: none;">' . $data['row'] . '</span>';
        $date = Carbon::parse($data['row'])->diffForHumans();
        $html .= $date;
        $html .= '</td>';
        $final['id'] = $data['id'];
        $final['key'] = $data['key'];
        $final['col'] = $data['col_name'];
        $final['html'] = $html;
        return $final;
    }
}

if (!function_exists('scrudTime')) {

    function scrudTime($data)
    {
        $final = [];
        $html = '<td class="tdDate td-' . $data['col_name'] . '"><span class="timeSearch" style="display: none;">' . $data['row'] . '</span>';
        $hour = explode(':', $data['row'])[0];
        $minutes = explode(':', $data['row'])[1];
        $html .= 'à ' . $hour . 'h' . $minutes;
        $html .= '</td>';
        $final['id'] = $data['id'];
        $final['key'] = $data['key'];
        $final['col'] = $data['col_name'];
        $final['html'] = $html;
        return $final;
    }
}

if (!function_exists('scrudStd')) {

    function scrudStd($data)
    {
        $final = [];
        $html = '<td class="tdStd td-' . $data['col_name'] . '">';
        $html .= $data['row'];
        $html .= '</td>';
        $final['id'] = $data['id'];
        $final['key'] = $data['key'];
        $final['col'] = $data['col_name'];
        $final['html'] = $html;
        return $final;
    }
}

if (!function_exists('rowsBuilder')) {

    function rowsBuilder($collect, $labels)
    {
        $html = '';

        foreach ($collect as $row) {

            $html .= '<tr class="trVisible">';
            $id = 0;
            foreach ($labels as $label) {

                foreach ($row as $value) {

                    $id = $value['id'];
                    if ($value['col'] == $label['name']) {

                        $html .= $value['html'];
                    }
                }
            }

            $html .= '<td><div class="scrudActions">';
            
            if ($_SERVER['REQUEST_URI'] != '/ips') {

                $html .= '<a class="scrudReadLink scrudActionLinks" title="Lire" href="' . $_SERVER['REQUEST_URI'] . '/read/' . $id . '">' . import_svg('read', 'actionIcons') . '</a>';
                $html .= '<a class="scrudEditLink scrudActionLinks" title="Modifier" href="' . $_SERVER['REQUEST_URI'] . '/edit/' . $id . '">' . import_svg('edit', 'actionIcons') . '</a>';
            }

            $html .= '<span class="scrudDeleteLink scrudActionLinks" title="Effacer" data-id="' . $id . '" data-url="' . $_SERVER['REQUEST_URI'] . '">' . import_svg('delete', 'actionIcons') . '</span>';
            $html .= '</div></td>';
            $html .= '</tr>';
        }

        return $html;
    }
}