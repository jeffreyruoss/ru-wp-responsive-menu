<?php
/*
Plugin Name: RU WP Responsive Menu
Plugin URI: https://jeffruoss.com
Description: A lightweight responsive mobile menu.
Version: 1.0.0
Author: Jeff Ruoss
Author URI: https://jeffruoss.com
License: GPL-2.0-or-later
Text Domain: ru-wp-responsive-menu
*/

// If this file is called directly, abort.
if (!defined('WPINC')) {
  die;
}

// Include the class files
require_once plugin_dir_path(__FILE__) . 'includes/class-menu.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-menu-item.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-menu-renderer.php';

class RU_WP_Responsive_Menu {
  public function __construct() {
    // Register hooks
    register_activation_hook(__FILE__, array($this, 'activate'));
    register_deactivation_hook(__FILE__, array($this, 'deactivate'));
    add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
  }

// Plugin activation
  public function activate() {
    // Log activation message
    error_log('RU WP Responsive Menu plugin activated.');
  }

// Plugin deactivation
  public function deactivate() {
    // Log deactivation message
    error_log('RU WP Responsive Menu plugin deactivated.');
  }


  // Enqueue styles and scripts
  public function enqueue_scripts() {
    wp_enqueue_style('ru-wp-responsive-menu', plugin_dir_url(__FILE__) . 'assets/css/ru-wp-responsive-menu.css');
    wp_enqueue_script('ru-wp-responsive-menu', plugin_dir_url(__FILE__) . 'assets/js/ru-wp-responsive-menu.js', array('jquery'), '1.0.0', true);
  }
}

// Initialize the plugin
$ru_wp_responsive_menu = new RU_WP_Responsive_Menu();
