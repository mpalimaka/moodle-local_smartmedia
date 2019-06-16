<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Plugin administration pages are defined here.
 *
 * @package     local_smartmedia
 * @copyright   2019 Matt Porritt <mattp@catalyst-au.net>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {

    $settings = new admin_settingpage('local_smartmedia', get_string('pluginname', 'local_smartmedia'));
    $ADMIN->add('localplugins', $settings);

    // Basic settings.
    $settings->add(new admin_setting_configtext('local_smartmedia/api_key',
            get_string('settings:aws:key', 'local_smartmedia'),
            get_string('settings:aws:key_help', 'local_smartmedia'),
            ''));

    $settings->add(new admin_setting_configpasswordunmask('local_smartmedia/api_secret',
            get_string('settings:aws:secret', 'local_smartmedia'),
            get_string('settings:aws:secret_help', 'local_smartmedia'),
            ''));

    $settings->add(new admin_setting_configtext('local_smartmedia/s3_input_bucket',
            get_string('settings:aws:input_bucket', 'local_smartmedia'),
            get_string('settings:aws:input_bucket_help', 'local_smartmedia'),
            ''));

    $settings->add(new admin_setting_configtext('local_smartmedia/s3_output_bucket',
            get_string('settings:aws:output_bucket', 'local_smartmedia'),
            get_string('settings:aws:output_bucket_help', 'local_smartmedia'),
            ''));

    $regionoptions = array(
        'us-east-1'      => 'us-east-1 (N. Virginia)',
        'us-east-2'      => 'us-east-2 (Ohio)',
        'us-west-1'      => 'us-west-1 (N. California)',
        'us-west-2'      => 'us-west-2 (Oregon)',
        'ap-northeast-1' => 'ap-northeast-1 (Tokyo)',
        'ap-northeast-2' => 'ap-northeast-2 (Seoul)',
        'ap-northeast-3' => 'ap-northeast-3 (Osaka)',
        'ap-south-1'     => 'ap-south-1 (Mumbai)',
        'ap-southeast-1' => 'ap-southeast-1 (Singapore)',
        'ap-southeast-2' => 'ap-southeast-2 (Sydney)',
        'ca-central-1'   => 'ca-central-1 (Canda Central)',
        'cn-north-1'     => 'cn-north-1 (Beijing)',
        'cn-northwest-1' => 'cn-northwest-1 (Ningxia)',
        'eu-central-1'   => 'eu-central-1 (Frankfurt)',
        'eu-west-1'      => 'eu-west-1 (Ireland)',
        'eu-west-2'      => 'eu-west-2 (London)',
        'eu-west-3'      => 'eu-west-3 (Paris)',
        'sa-east-1'      => 'sa-east-1 (Sao Paulo)'
    );

    $settings->add(new admin_setting_configselect('local_smartmedia/api_region',
            get_string('settings:aws:region', 'local_smartmedia'),
            get_string('settings:aws:region_help', 'local_smartmedia'),
            'ap-southeast-2',
            $regionoptions));
}