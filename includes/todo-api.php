<?php


//only one api action calliing function depending on data recieved and verifying nonce

function manage_tasks_ajax_action(){

    $nonce = $_REQUEST['nonce'];

    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
        die( 'Nonce value cannot be verified.' );
    }


    if($_REQUEST['name']!== ''&& $_REQUEST['key'] === '10000'){
        create_new_task(sanitize_text_field($_REQUEST['name']));
    }
    if($_REQUEST['name']!== ''&& $_REQUEST['key'] !== '10000'){
        edit_task(sanitize_text_field($_REQUEST['name']), sanitize_key($_REQUEST['key']));
    }

    if($_REQUEST['name']=== ''&& $_REQUEST['key'] !== '10000' && $_REQUEST['type']!== ''){
       if ($_REQUEST['type']=== 'delete'){
           delete_task(sanitize_key($_REQUEST['key']));
       }elseif ($_REQUEST['type']=== 'change'){
           toggle_task_status(sanitize_key($_REQUEST['key']));
       }
    }

die();
}



add_action( 'wp_ajax_todo_ajax_request', 'manage_tasks_ajax_action' );


//functions managing tasks

function create_new_task($name){
    $tasks = get_option('todo_task_list');

    $tasks[] = [
        'name' => $name,
        'done' => 0
    ];

    update_option('todo_task_list', $tasks);
}

function delete_task($key){
    $tasks = get_option('todo_task_list');

    unset($tasks[$key]);

    update_option('todo_task_list', $tasks);
}

function edit_task($name, $key){
    $tasks = get_option('todo_task_list');

    $tasks[$key]['name'] = $name;

    update_option('todo_task_list', $tasks);
}

function toggle_task_status($key){
    $tasks = get_option('todo_task_list');

    if ($tasks[$key]['done'] === 0){
        $tasks[$key]['done'] = 1;
    }elseif($tasks[$key]['done'] === 1){
    $tasks[$key]['done'] = 0;
    }

    update_option('todo_task_list', $tasks);
}