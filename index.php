<?php
define('NO_OUTPUT_BUFFERING', true);
require '../../config.php';

// Display the bar of the long running task.

$PAGE->set_context(context_system::instance());
$PAGE->set_url('/local/example/view.php');

echo $OUTPUT->header();
echo $OUTPUT->heading('All running stored progress bars');

$records = $DB->get_records('stored_progress');
foreach ($records as $record) {

    $bar = \core\stored_progress_bar::load($record->idnumber);
    if ($bar) {
        $bar->render();
    }

    echo '<hr>';

}


// $pt = new progress_bar('zbar', 900);
// $pt->create();
// $num_tasks = 200; // the number of tasks to be completed.
// for($cur_task = 0; $cur_task <= $num_tasks; $cur_task++)
// {
//     for ($i=0; $i<100000; $i++)
//     {
//         ;;;
//     }
//     $pt->update($cur_task, $num_tasks, 'this is'. $cur_task . 'h');
// }

echo $OUTPUT->footer();
