<?php


// Register scripts
function todo_enqueue_admin_scripts($hook)
{

    wp_register_script(
        'todo-plugin-bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js',
        ['jquery'],
        time()
    );
    wp_register_script(
        'todo-plugin-ajax',
        TODO_URL . 'assets/js/todo-ajax.js',
        ['jquery'],
        time()
    );

    wp_register_script(
        'todo-plugin-main',
        TODO_URL . 'assets/js/todo-main.js',
        ['todo-plugin-ajax'],
        time()
    );

    wp_localize_script(
        'todo-plugin-ajax',
        'todo_ajax_obj',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce('ajax-nonce')
        )
    );

    wp_enqueue_script('todo-plugin-bootstrap');
    wp_enqueue_script('todo-plugin-ajax');
    wp_enqueue_script('todo-plugin-main');


}

add_action('admin_enqueue_scripts', 'todo_enqueue_admin_scripts', 100);