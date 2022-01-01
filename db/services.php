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

$functions = array(
    'local_foootballscore_delete_score_by_id' => array(
        'classname'   => 'local_footballscore_external',
        'methodname'  => 'delete_score_by_id',
        'classpath'   => 'local/footballscore/external.php',
        'description' => 'Delete a single score by id',
        'type'        => 'write',
        'ajax'        => true
    ),
);