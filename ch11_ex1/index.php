<?php
$task_list = filter_input(INPUT_POST, 'tasklist', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

if ($task_list === NULL) {
    $task_list = array();
}

$action = filter_input(INPUT_POST, 'action');
$errors = array();
$task_to_modify = '';
$task_index = -1;
$modify_mode = false;

switch ($action) {
    case 'Add Task':
        $new_task = filter_input(INPUT_POST, 'newtask');
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            $task_list[] = $new_task;
        }
        break;

    case 'Delete Task':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($task_index === NULL || $task_index === FALSE) {
            $errors[] = 'The task cannot be deleted.';
        } else {
            unset($task_list[$task_index]);
            $task_list = array_values($task_list);
        }
        break;

    case 'Modify Task':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($task_index === NULL || $task_index === FALSE) {
            $errors[] = 'The task cannot be modified.';
        } else {
            $task_to_modify = $task_list[$task_index];
            $modify_mode = true;
        }
        break;

    case 'Save Changes':
        $modified_task_id = filter_input(INPUT_POST, 'modifiedtaskid', FILTER_VALIDATE_INT);
        $modified_task = filter_input(INPUT_POST, 'modifiedtask');
        if ($modified_task_id !== NULL && $modified_task_id !== FALSE && !empty($modified_task)) {
            $task_list[$modified_task_id] = $modified_task;
            $modify_mode = false;
        }
        break;

    case 'Cancel Changes':
        $modify_mode = false;
        break;

    case 'Promote Task':
        // Add logic for promoting a task
        break;

    case 'Sort Tasks':
        // Add logic for sorting tasks
        break;
}

include('task_list.php');
?>
