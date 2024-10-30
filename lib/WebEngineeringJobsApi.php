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

namespace lib;

class WebEngineeringJobsApi {

    private $_api_url = 'http://www.web-engineering-jobs.com/api/latest';
    private $_data;

    public function __construct() {
        $data = $this->getJsonData();
        $this->_data = $data;
    }

    public function getListArray() {
        return json_decode($this->_data);
    }

    private function getJsonData() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->_api_url);
        curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }
} 