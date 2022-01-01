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
 * Edit or Create a record.
 *
 * @package    local_footballscore
 * @copyright  2021 Shadman Ahmed
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once($CFG->libdir . "/externallib.php");
require_once($CFG->dirroot . "/course/externallib.php");

class local_footballscore_external extends external_api {
    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function delete_score_by_id_parameters(): external_function_parameters {
        return new external_function_parameters(
            array(
                'id' => new external_value(PARAM_INT, 'score id'),
            )
        );
    }

    /**
     * @param int $id
     * @return array
     */
    public static function delete_score_by_id(int $id): array {
        global $DB;

        $warnings = array();

        return array(
            'id' => $id,
            'warnings' => $warnings
        );

    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function delete_score_by_id_returns() {
        return new external_single_structure(
            array(
                'id' => new external_value(PARAM_INT, 'score id'),
                'warnings' => new external_warnings()
            )
        );
    }
}