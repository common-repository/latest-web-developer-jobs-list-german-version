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

/**
 * Init-Funktion for the Plugin
 */
function WWNLatestJobsPlugin() {
}

function wwn_shortcode() {
    if (!class_exists('WebEngineeringJobsApi')) {
        require_once __DIR__. DIRECTORY_SEPARATOR. 'lib'. DIRECTORY_SEPARATOR. 'WebEngineeringJobsApi.php';

        $api = new \lib\WebEngineeringJobsApi();
        $data = $api->getListArray();

        $html = '<div class="web-engineering-jobs joblist"><h3>Aktuelle Stellenanzeigen auf <a href="http://www.web-engineering-jobs.com" target="_blank" title="Aktuelle Stellenanzeigen von web-engineering-jobs.com">web-engineering-jobs.com</a></h3><ul>';

        foreach ($data->jobs as $job) {
            $html .= '<li class="joblistitem">';
            $html .= '<span class="jobdate"><small>'. date('d.m.y', strtotime($job->created_at)). '</small></span>: <a href="'. $job->url. '" target="_blank" title="Aktuelle Stellenanzeigen bei web-engineering-jobs.com">'. $job->title. '</a>, <span class="jobcity">'. $job->city. '</span>';
            $html .= '</li>';
        }

        $html .= '</ul><a href="'. $data->info->base_url. '" target="_blank" title="Aktuelle Stellenanzeigen von web-engineering-jobs.com">Mehr Stellenangebote</a>';
        $html .= '</div>';

        return $html;
    }
}
add_shortcode('web-engineering-jobs', 'wwn_shortcode');
