<?php
/*
Plugin Name: To-Do-List-WP
Author: Jan Kotlarski
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: todolist
Domain Path:  /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

define('TODO_URL', plugin_dir_url(__FILE__));
define('TODO_DIR', plugin_dir_path(__FILE__));

include(plugin_dir_path(__FILE__).'includes/wptodo-styles.php');
include(plugin_dir_path(__FILE__).'includes/wptodo-scripts.php');
include(plugin_dir_path(__FILE__).'includes/todo-menus.php');
include(plugin_dir_path(__FILE__).'includes/wptodo-options.php');
include(plugin_dir_path(__FILE__).'includes/wptodo-api.php');