<?php


//Add To DO page to admin menu
function todo_plugin_settings_page(){
    add_menu_page(
        'ToDoList',
        'ToDoList',
        'manage_options',
        'todolist',
        'todo_markup',
        'dashicons-list-view',
        100
    );
}

add_action('admin_menu','todo_plugin_settings_page');






function todo_markup(){
    if ( !current_user_can('manage_options') ) {
        return;
    }

    include (TODO_DIR.'includes/templates/todo-page.php');
}