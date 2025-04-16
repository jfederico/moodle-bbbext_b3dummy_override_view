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
 * View Override for a BigBlueButtonBN instance.
 *
 * @package   bbbext_b3dummy_override_view
 * @copyright 2025 onwards, Blindside Networks Inc
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Jesus Federico  (jesus [at] blindsidenetworks [dt] com)
 */

use mod_bigbluebuttonbn\instance;
use mod_bigbluebuttonbn\plugin;
use mod_bigbluebuttonbn\local\proxy\bigbluebutton_proxy;
use bbbext_b3dummy_override_view\output\view;

require_once(__DIR__ . '/../../../../config.php');

$id = required_param('id', PARAM_INT);
$instance = instance::get_from_cmid($id);

if (!$instance) {
    throw new moodle_exception('view_error_url_missing_parameters', plugin::COMPONENT);
}

$cm = $instance->get_cm();
$course = $instance->get_course();
$bigbluebuttonbn = $instance->get_instance_data();

require_login($course, true);

// Require a working server.
bigbluebutton_proxy::require_working_server($instance);

// Mark viewed by user (if required).
$completion = new completion_info($course);
$completion->set_module_viewed($cm);

// Print the page header.
$PAGE->set_url($instance->get_view_url());
$PAGE->set_title($cm->name);
$PAGE->set_cacheable(false);
$PAGE->set_heading($course->fullname);

// Output starts.
$renderer = $PAGE->get_renderer('bbbext_b3dummy_override_view');
$renderedinfo = $renderer->render(new view($instance));

echo $OUTPUT->header();

echo html_writer::tag('h3', s($instance->get_meeting_name()), []);
echo html_writer::tag('h5', s($instance->get_meeting_description()), []);

echo html_writer::div('Hello from b3dummy_override_view!', 'alert alert-success');

echo $renderedinfo;

echo $OUTPUT->footer();