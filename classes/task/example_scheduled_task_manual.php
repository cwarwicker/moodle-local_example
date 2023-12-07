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

class example_scheduled_task_manual extends \core\task\scheduled_task {

    use \core\task\pollable_task_trait;

    public function get_name() {
        return 'Example scheduled task';
    }

    public function execute() {

        $this->start_polling();

        $seconds = 30;
        for ($i = 1; $i <= $seconds; $i++) {

            $percent = round(($i / 30) * 100);
            mtrace("{$percent}% done");
            $this->set_task_progress($percent);
            sleep(1);

        }

        $this->end_polling();

    }

}
