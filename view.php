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

use bbbext_b3dummy_override_view\output\view;
use mod_bigbluebuttonbn\instance;
use mod_bigbluebuttonbn\plugin;

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

$PAGE->set_url(new moodle_url('/mod/bigbluebuttonbn/extension/b3dummy_override_view/view.php'));

$PAGE->set_context($context);
$PAGE->set_title(get_string('pluginname', 'bbbext_b3dummy_override_view'));

echo $OUTPUT->header();

echo $OUTPUT->heading('✅ b3dummy_override_view loaded successfully');
echo html_writer::div('Hello from b3dummy_override_view!', 'alert alert-success');

$renderer = $PAGE->get_renderer('bbbext_b3dummy_override_view');
$renderable = new view($instance);
echo $renderer->render($renderable);

echo $OUTPUT->footer();