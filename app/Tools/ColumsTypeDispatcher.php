<?php

if (!function_exists('dispatcher')) {

    /**
     * Dispatching columns types corresponding to HTML tags
     * Models :
     *
     * $data = [
     *      'results' => [...DB data],
     *      'joins' => [
     *          'user_id' => ['relation' => 1, 'data' => User::DB, 'values' => []],
     *          'role_id' => ['relation' => 'n', 'data' => Role::DB, 'values' => [val1, val2, ...]],
     *          ...
     *      ],
     *      'types' => [
     *          'Database column name' => ['col' => 'Database column name', 'custom_col' => 'My custom label', 'type' => 'HTML tag type'],
     *          'Database column name' => ['col' => 'Database column name', 'custom_col' => 'My custom label', 'type' => 'HTML tag type'],
     *          'Database column name' => ['col' => 'Database column name', 'custom_col' => 'My custom label', 'type' => 'HTML tag type'],
     *          ...
     *      ]
     * ];
     *
     * @param $data // Array
     * @param $mode // String ( 'new' || 'read' || 'edit' )
     * @return string
     */

    function dispatcher($data, $mode)
    {
        $results = $data['results'];
        $joins = $data['joins'];
        $types = $data['types'];
        $html = '';

        foreach ($types as $index => $type) {

            if (isset($joins[$index])) {

                $html .= relationType($results, $type, $joins[$index]['relation'], $joins[$index]['data'], $joins[$index]['values'], $mode);

            } else {

                $html .= inputType($results, $type, $mode);
            }
        }

        return $html;
    }
}

if (!function_exists('relationType')) {

    function relationType($data, $type, $relation, $relationData, $values, $mode)
    {
        $html = '';

        if ($relation == 1) {

            $html .= selectType($data, $type, $relationData, $mode);

        } else if ($relation == 'n') {

            $html .= checkboxType($type, $relationData, $values, $mode);

        } else {

            trigger_error('Function selectType() type must be "n" or 1');
        }

        return $html;
    }
}

if (!function_exists('selectType')) {

    function selectType($data, $type, $relationData, $mode)
    {
        $html = '<div class="inputs selectInputs">';
        $html .= '<label>' . $type['custom_col'] . '</label>';

        if ($mode != 'read') {

            $html .= '<select name="' . $type['col'] . '" required>';
            $html .= '<option>Choisir</option>';
            $value = (!empty($data) && isset($data[$type['col']])) ? $data[$type['col']] : '';

            foreach ($relationData as $item) {

                $html .= '<option ' . (($value == $item['id']) ? 'selected' : '') . ' value="' . $item['id'] . '">' . $item['label'] . '</option>';
            }

            $html .= '</select>';

        } else {

            $html .= '<input type="text" readonly value="' . ((isset($data[$type['col']])) ? $data[$type['col']] : '') . '">';
        }

        $html .= '</div>';
        return $html;
    }
}

if (!function_exists('checkboxType')) {

    function checkboxType($type, $relationData, $values, $mode)
    {
        $readOnly = ($mode == 'read') ? 'readonly' : '';
        $html = '<div class="inputs checkboxInputs">';
        $html .= '<label>' . $type['custom_col'] . '</label>';

        foreach ($relationData as $item) {

            $html .= '<div class="checkbox-container">';
            $html .= '<input ' . ((!empty($values) && in_array($item['id'], $values)) ? 'checked' : '') . ' type="checkbox" value="' . $item['id'] . '" name="' . $type['col'] . '[]" required ' . $readOnly . '>';
            $html .= '<span>' . $item['label'] . '</span>';
            $html .= '</div>';
        }

        $html .= '</div>';
        return $html;
    }
}

if (!function_exists('inputType')) {

    function inputType($data, $type, $mode)
    {
        $readOnly = ($mode == 'read') ? 'readonly' : '';
        $value = (!empty($data) && isset($data[$type['col']])) ? $data[$type['col']] : '';
        $html = '<div class="inputs ' . $type['type'] . 'Inputs">';
        $html .=  '<label>' . $type['custom_col'] . '</label>';

        if ($type['type'] == 'text') {

            $html .= '<textarea ' . $readOnly . ' value="' . $value . '" name="' . $type['col'] . '">' . $value . '</textarea>';

        } else if ($type['type'] == 'editor') {

            $html .= '<span class="addTextarea">&plus;</span>';
            $html .= '<textarea ' . $readOnly . ' value="' . $value . '[]" name="' . $type['col'] . '">' . $value . '</textarea>';

        } else if ($type['type'] == 'radio') {

            $html .= '<div class="radio-container">';
            $html .= '<input ' . (($value == 1) ? 'checked' : '') . ' type="radio" name="' . $type['col'] . '" value="1" ' . $readOnly . '>';
            $html .= '<span>Oui</span>';
            $html .= '<input ' . (($value == 0) ? 'checked' : '') . ' type="radio" name="' . $type['col'] . '" value="0" ' . $readOnly . '>';
            $html .= '<span>Non</span>';
            $html .= '</div>';

        } else {

            $html .= '<input ' . $readOnly . ' name="' . $type['col'] . '" value="' . $value . '" required>';
        }

        $html .= '</div>';
        return $html;
    }
}