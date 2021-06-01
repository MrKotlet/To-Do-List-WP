<?php
/*
Plugin Name: To-Do-List-WP
Author: Jan Kotlarski
Description: Simple To Do list plugin
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

define('TODO_URL', plugin_dir_url(__FILE__));
define('TODO_DIR', plugin_dir_path(__FILE__));

include(plugin_dir_path(__FILE__).'includes/todo-styles.php');
include(plugin_dir_path(__FILE__).'includes/todo-scripts.php');
include(plugin_dir_path(__FILE__).'includes/todo-menus.php');
include(plugin_dir_path(__FILE__).'includes/todo-options.php');
include(plugin_dir_path(__FILE__).'includes/todo-api.php');