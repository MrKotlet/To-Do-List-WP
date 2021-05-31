<?php



//Registering Styles
function todo_enqueue_admin_styles($hook){

    wp_register_style(
        'todo-plugin-bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css',
        [],
        'v1'
    );

    wp_register_style(
        'todo-plugin-styles',
        TODO_URL . 'assets/css/todo-style.css',
        ['todo-plugin-bootstrap'],
        'v1'
    );


        wp_enqueue_style('todo-plugin-bootstrap');
        wp_enqueue_style('todo-plugin-styles');


}

add_action('admin_enqueue_scripts','todo_enqueue_admin_styles');