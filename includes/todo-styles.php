<?php



//Registering Styles
function todo_enqueue_admin_styles($hook){

    wp_register_style(
        'todo-plugin-admin',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css',
        [],
        time()
    );
//Loads styles only on To Do LIst plugin page
    if('toplevel_page_todolist'===$hook){
        wp_enqueue_style('todo-plugin-admin');
    }

}

add_action('admin_enqueue_scripts','todo_enqueue_admin_styles');