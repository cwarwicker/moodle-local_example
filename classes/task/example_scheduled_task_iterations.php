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
 * Example scheduled task.
 *
 * @package    local_example
 * @copyright  2023 onwards Catalyst IT {@link http://www.catalyst-eu.net/}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Conn Warwicker <conn.warwicker@catalyst-eu.net>
 */

namespace local_example\task;

class example_scheduled_task_iterations extends \core\task\scheduled_task {

    use \core\task\pollable_task_trait;

    public function get_name() {
        return 'Example scheduled task';
    }

    public function execute() {

        // Polling must be started to use the functionality.
        $this->start_polling();

        // This simulates a specific count of iterations the task will do, e.g. x number of courses to loop through and do something.
        $iterations = 10;

        // We need to tell the progress trait what the total number of iterations we will be going through is.
        $this->set_task_progress_iterations($iterations);

        for ($i = 1; $i <= $iterations; $i++) {

            // Here we just update and tell it which one we are on and it will work out % from those.
            $this->update_task_progress_iteration($i);

            mtrace("{$i}/{$iterations}");
            sleep(mt_rand(1, 3));

        }

        // Remember to end polling to delete the record.
        $this->end_polling();

    }

}
