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
 * Deleting a score.
 *
 * @package    local_footballscore
 * @copyright  2021 Shadman Ahmed
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../config.php');

global $DB;

$id = optional_param('id', 0, PARAM_INT);

$PAGE->set_url(new moodle_url('/local/footballscore/delete.php', array('id' => $id)));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('deletescore', 'local_footballscore'));

try {
    $DB->delete_records('local_footballscore', array('id' => $id));
    redirect(new moodle_url('/local/footballscore/manage.php'), get_string('deletemessage', 'local_footballscore'));
} catch (Exception $exception) {
    throw new moodle_exception($exception);
}


