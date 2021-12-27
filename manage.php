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
 * Plugin manage page.
 *
 * @package    local_footballscore
 * @copyright  2021 Shadman Ahmed
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../config.php');

global $DB;

$PAGE->set_url(new moodle_url('/local/footballscore/manage.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Manage Football Scores');

$goalrecords= $DB->get_records('local_footballscore');

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('pluginname', 'local_footballscore'));
$templatecontext = (object)[
    'texttodisplay'=> array_values($goalrecords),
    'editurl'=> new moodle_url('/local/footballscore/edit.php'),
    'deleteurl'=> new moodle_url('/local/footballscore/delete.php'),
];

echo $OUTPUT->render_from_template('local_footballscore/manage',$templatecontext);
echo $OUTPUT->footer();