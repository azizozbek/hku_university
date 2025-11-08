<?php

namespace HKU\Theme;

use WP_Site;

class AddFacultyOption
{
    public const string OPTION_NAME = 'hku_department_faculty';
    function __construct() {
        add_action( 'admin_menu', [$this, 'hku_add_faculty_option_for_departments'] );
    }

    public function hku_add_faculty_option_for_departments() {

        $option_name = AddFacultyOption::OPTION_NAME;

        // register the option
        register_setting( 'general', $option_name, ['default' => 0] );

        // add a field
        add_settings_field(
            'faculty-id',
            'Department Faculty',
            [$this, 'show_faculty_field'],
            'general',
        );
    }

    public function show_faculty_field() {

        $output = '<select name="'.AddFacultyOption::OPTION_NAME.'" id="faculty">';
        $output .= "<option value='0'> </option>";
        $currentValue = get_option(AddFacultyOption::OPTION_NAME);

        $faculties = get_sites(['site__not_in' => [1]]);
        /**
         * @var WP_Site $faculty
         */
        foreach ($faculties as $faculty) {
            $selected = ($faculty->id == $currentValue) ? ' selected="selected"' : '';

            $output .= "<option value='$faculty->id' $selected >$faculty->blogname</option>";
        }

        $output .= '</select>';
        echo $output;
    }
}