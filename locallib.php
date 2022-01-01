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
 * Plugin's library functions.
 *
 * @package    local_footballscore
 * @copyright  2021 Shadman Ahmed
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * This function prints all the score from the db table.
 *
 * @return void
 */
function local_footballscore_display_scores( ) {
    global $DB, $OUTPUT;
    $goalrecords= $DB->get_records('local_footballscore');

    // Data to be passed in the manage template.
    $templatecontext = (object)[
        'texttodisplay'=> array_values($goalrecords),
        'editurl'=> new moodle_url('/local/footballscore/edit.php'),
        'deleteurl'=> new moodle_url('/local/footballscore/delete.php'),
    ];

    echo $OUTPUT->render_from_template('local_footballscore/manage',$templatecontext);
}

/**
 * This function create or edit a single record.
 *
 * @param int $id
 * @param stdClass $mform
 * @return void
 */
function local_footballscore_edit_score($mform, $id = null) {
    global $DB;
    if ($mform->is_cancelled()) {
        //Back to manage.php
        redirect(new moodle_url('/local/footballscore/manage.php'));
    } else if ($fromform = $mform->get_data()) {
        // Inserting data to DB
        $recordstoinsert = new stdClass();
        $recordstoinsert->team1=$fromform->team1;
        $recordstoinsert->team2=$fromform->team2;
        $recordstoinsert->goal1=$fromform->goal1;
        $recordstoinsert->goal2=$fromform->goal2;
        if($fromform->id) {
            $recordstoinsert->id = $fromform->id;
            $DB->update_record('local_footballscore', $recordstoinsert);
            // Go back to manage page.
            redirect(new moodle_url('/local/footballscore/manage.php'), get_string('updatethanks', 'local_footballscore'));

        } else {
            $DB->insert_record('local_footballscore', $recordstoinsert);
            // Go back to manage page.
            redirect(new moodle_url('/local/footballscore/manage.php'), get_string('insertthanks', 'local_footballscore'));
        }
    }
}
