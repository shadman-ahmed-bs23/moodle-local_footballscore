<?php

function local_footballscore_delete_score($id) {
    global $DB;
    try {
        $DB->delete_records('local_footballscore', array('id' => $id));
    } catch (Exception $exception) {
        throw new moodle_exception($exception);
    }
}