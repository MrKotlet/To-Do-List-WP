<?php


//registering option which value is table with tasks

function todo_list_options(){

    add_option('todo_task_list', [
        ['name' => 'Example Task 1',
            'done' => 0],
        ['name' => 'Example Task 2',
            'done' => 0],
        ['name' => 'Example Task 3',
            'done' => 1]

    ]);




}

add_action('admin_init', 'todo_list_options');