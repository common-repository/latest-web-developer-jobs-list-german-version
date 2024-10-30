<?php
/*
    Latest Web Developer Jobs
    Written by Anton Dachauer (http://www.webworks-nuernberg.de)

    Copyright 2014  Anton Dachauer/Webworks Nürnberg (email : kontakt@webworks-nuernberg.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


if (!function_exists('ADgetTagBase')) {
    function ADgetTagBase() {
        global $wpdb;

        $row = $wpdb->get_row($wpdb->prepare("SELECT option_value FROM $wpdb->options WHERE option_name = %s LIMIT 1", "tag_base"));

        if (strlen($row->option_value) > 0) {
            return $row->option_value;
        }

        return 'tag';
    }
}

if (!function_exists('ADgetCategoryBase')) {
    function ADgetCategoryBase() {
        global $wpdb;

        $row = $wpdb->get_row($wpdb->prepare("SELECT option_value FROM $wpdb->options WHERE option_name = %s LIMIT 1", "category_base"));

        if (strlen($row->option_value) > 0) {
            return $row->option_value;
        }

        return 'category';
    }
}
