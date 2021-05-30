<?php


// Register scripts
function todo_enqueue_admin_scripts($hook){

    wp_register_script(
        'todo-plugin-bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js',
        ['jquery'],
        time()
    );
    wp_register_script(
        'todo-plugin-main',
        TODO_URL.'assets/js/todo-main.js',
        ['jquery'],
        time()
    );

    wp_localize_script('testplugin-admin','dupa',[
        'hook'=>$hook,

    ]);
//Loads scripts only on To Do LIst plugin page
    if('toplevel_page_todolist'===$hook){
        wp_enqueue_script('todo-plugin-bootstrap');
        wp_enqueue_script('todo-plugin-main');
    }



}

add_action('admin_enqueue_scripts','todo_enqueue_admin_scripts',100);