<?php

define('CLI_SCRIPT', true);

require_once(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/clilib.php');

$num_tasks = 1000; // the number of tasks to be completed.

$progress = new \core\stored_progress_bar('example-cli-bar');
$progress->start();

for($cur_task = 0; $cur_task <= $num_tasks; $cur_task++)
{
    $progress->update($cur_task, $num_tasks, 'this is '. $cur_task . '/' . $num_tasks);
}

mtrace('done');

mtrace('=================');

$pt = new progress_bar('zbar', 900);
$pt->create();
$num_tasks = 200; // the number of tasks to be completed.
for($cur_task = 0; $cur_task <= $num_tasks; $cur_task++)
{
    for ($i=0; $i<100000; $i++)
    {
        ;;;
    }
    $pt->update($cur_task, $num_tasks, 'this is'. $cur_task . 'h');
}

mtrace('done');