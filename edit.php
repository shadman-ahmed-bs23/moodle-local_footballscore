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
 * Version information
 *
 * @package    local_footballscore
 * @copyright  2021 Shadman Ahmed
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../config.php');
require_once('./locallib.php');
require_once($CFG->dirroot.'/local/footballscore/classes/form/edit_form.php');

try {
    require_login();
} catch (Exception $exception) {
    print_r($exception);
}


$id = optional_param('id', 0, PARAM_INT);
$PAGE->set_url(new moodle_url('/local/footballscore/edit.php', array('id' => $id)));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('createoredit', 'local_footballscore'));
global $DB;

// To be passed in the constructor of edit form.
$actionurl = new moodle_url('/local/footballscore/edit.php');
if ($id) {
    $score = $DB->get_record('local_footballscore', array('id' => $id));
    $mform=new edit_form($actionurl, $score);
}
else {
    $mform = new edit_form($actionurl);
}

// Edit or create a record for score.
local_footballscore_edit_score($id, $mform);

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('createoredit', 'local_footballscore'));

$mform->display();

echo $OUTPUT->footer();